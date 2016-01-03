<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {

    protected $fillable = ['employee_id', 'title', 'start', 'end', 'comment'];

}
