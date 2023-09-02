<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
      return view("layouts/master");
    }

}