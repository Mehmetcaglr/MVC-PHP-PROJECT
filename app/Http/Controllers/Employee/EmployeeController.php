<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\BaseController;
use App\Http\Middleware\Middleware;
use App\Http\Request\Request;
use App\Model\Employee\Employee;
use Routers\Route;

class EmployeeController extends BaseController
{
    public function __construct()
    {
        Route::middleware("auth");
    }

    public function index(Request $request)
    {

        echo "test";
        $employees = new Employee();

        $data = $employees->query()->get();

//        echo "<pre>";
//        var_dump($data);die;
//        echo $employees->getFirstName();die;
//        echo $data;die;
        return json_encode($data);
    }

    public function edit(Request $request, $id)
    {
        $employees = new Employee();

        $data = $employees->query()->where("id", $id)->first();

        return json_encode($data);
    }
}