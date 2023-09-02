<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Request\Request;

class Middleware
{
    /**
     * @param $class
     * @param Closure $next
     * @param Request $request
     * @return mixed
     */
    public static function call($class, Closure $next, Request $request)
    {
        return call_user_func_array([new $class, 'handle'],[$next, $request]);
    }
}