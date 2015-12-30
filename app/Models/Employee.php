<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	public function scopeSexStats()
	{
		return $this->select('sex', DB::raw('count(*) as total'))
			 ->groupBy('sex')
			 ->lists('total', 'sex')
			 ->all();
	}

	public function scopeSalaryRanges()
	{
		return $this->select('salary', DB::raw("case"
				. " when salary between 100 and 500 then '100-500'"
				. " when salary between 500 and 1000 then '500-1000'"
				. " when salary between 1000 and 2000 then '1000-2000'"
				. " else '2000+'"
				. " end as `salary_range`, count(*) as count"))
			->groupBy('salary_range')
			->lists('count', 'salary_range')
			->all();
	}

	public function scopeRegisterDates()
	{
		return $this->select('created_at', DB::raw('count(*) as count, DATE_FORMAT(created_at, "%Y-%m") as month'))
			->groupBy(DB::raw('YEAR(created_at), MONTH(created_at)'))
			->lists('count', 'month')
			->all();
	}

}
