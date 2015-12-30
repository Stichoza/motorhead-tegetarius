<?php

namespace App\Repositories;

use App\Models\Employee;
use DB;

class EmployeeRepository extends Repository {

    protected $modelName = Employee::class;

    /**
     * EmployeeRepository constructor.
     * @internal param Container $app
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Return model class name
     * @return mixed
     */
    public function model() {
		return Employee::class;
	}

    /**
     * Get gender stats
     *
     * @return array
     */
    public function sexStats()
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
	
}
