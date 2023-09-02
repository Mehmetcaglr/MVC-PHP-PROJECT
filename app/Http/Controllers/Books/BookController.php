<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\BaseController;
use App\Http\Request\Request;
use App\Model\Book\Book;
use App\Model\Employee\Employee;
use GuzzleHttp\Client;
use Routers\Route;

class BookController extends BaseController
{
    public function __construct()
    {
        Route::middleware('auth');
    }
    public function index()
    {
        $employess = new Employee();

        return json_encode($employess);
    }

    public function create()
    {
        $request = new Request();
        $data= ["name" => "Hüseyin"];

        return view("book/list" ,$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ["required","string", "max:2"],
            'surname' => ["required", "string", "max:2"],
            'email' => ["required", "string", "email", "exits:users"],
            'password' => ["required", "string","min:6"],
            'confirmed_password' => ["required", "string","min:6"],
        ]);

        echo "<pre>";
        print_r($request->all());
    }
}