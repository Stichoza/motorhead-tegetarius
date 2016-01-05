<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Course;
use App\Models\Employee;
use DB;

class EmployeeRepository extends Repository {

    protected $modelName = Employee::class;

    private static $rules = [
        'name' => 'required',
        'sex' => 'required|in:male,female',
        'position' => 'required',
        'salary' => 'required|numeric',
        'address' => 'required|array|min:1',
    ];

    public static function rules($input = [])
    {
        $rules = self::$rules;
        if (empty($input['address'])) {
            $input['address'] = [1 => []];
        }
        foreach ($input['address'] as $key => $value) {
            $rules['address.' . $key . '.city'] = 'required';
            $rules['address.' . $key . '.street'] = 'required';
            $rules['address.' . $key . '.number'] = 'required';
            break;
        }
        return $rules;
    }

    /**
     * EmployeeRepository constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get gender stats
     *
     * @return array
     */
    public function genderStats()
	{
		return $this->model->select('sex', DB::raw('count(*) as total'))
			 ->groupBy('sex')
			 ->lists('total', 'sex')
			 ->all();
	}

    /**
     * Get salary stats
     *
     * @return array
     */
    public function salaryRanges()
	{
		return $this->model->select('salary', DB::raw("case"
				. " when salary between 100 and 500 then '100-500'"
				. " when salary between 500 and 1000 then '500-1000'"
				. " when salary between 1000 and 2000 then '1000-2000'"
				. " else '2000+'"
				. " end as `salary_range`, count(*) as count"))
			->groupBy('salary_range')
			->lists('count', 'salary_range')
			->all();
	}

    /**
     * Get registration stats
     *
     * @return array
     */
    public function registerDates()
	{
		return $this->model->select('created_at', DB::raw('count(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month'))
			->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
			->lists('count', 'month')
			->all();
	}

    public static function save($data, $id = null)
    {
        if ($id) {
            $employee = Employee::findOrFail($id);
        } else {
            $employee = Employee::create($data);
        }

        Address::whereEmployeeId($employee->id)->delete();
        Course::whereEmployeeId($employee->id)->delete();

        foreach (array_get($data, 'address', []) as $key => $d) {
            if (empty($d['city']) && empty($d['street']) && empty($d['number'])) {
                continue;
            }
            $address = new Address($d);
            $address->employee_id = $employee->id;
            $address->save();
        }
        foreach (array_get($data, 'course', []) as $key => $d) {
            if (empty($d['title']) && empty($d['start']) && empty($d['end'])) {
                continue;
            }
            $course = new Course($d);
            $course->employee_id = $employee->id;
            $course->save();
        }

        return $employee;
    }
	
}
