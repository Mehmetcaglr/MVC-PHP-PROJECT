<?php

namespace App\Model\Address;

use App\Model\Model;

class Address extends Model
{
    protected $table = "addreses";

    protected $primaryKey = "id";

    protected $fiilable = ["name"];

}