<?php

namespace App\Model\User;

use App\Model\Model;

class User extends Model
{

    protected $table = "users";

    protected $primaryKey = "id";

    protected $fiilable = ["First_name", "Second_name", "Last_name", "Identification_number", "Email","Phone"];



}