<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    protected $fillable = ['name', 'sex', 'position', 'salary'];

}
