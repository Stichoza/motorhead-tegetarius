<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

    protected $fillable = ['name', 'sex', 'position', 'salary'];

    /**
     * Relation to addresses
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses() {
        return $this->hasMany(Address::class);
    }

    /**
     * Relation to courses
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses() {
        return $this->hasMany(Course::class);
    }

}
