<?php

namespace App\Model\Employee;

use App\Model\Model;

/**
 * Class Employee
 * @package App
 * @property string $first_name
 *
 */
class Employee extends Model
{

    protected $table = "employees";

    protected $fillable = ["id", "user_id", "national_id_number", "first_name", "last_name", "middle_name"];

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function users()
    {
        return $this->hasMany("users",'id', "user_id");
    }

}