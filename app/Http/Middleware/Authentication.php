<?php

namespace App\Http\Middleware;

use App\Http\Middleware\IMiddleware;
use App\Http\Request\Request;
use Closure;

class Authentication implements IMiddleware
{
    /**
     * @param Closure $next
     * @param Request $request
     * @return mixed|void
     */
    public function handle(Closure $next, Request $request)
    {
        if (isset($_SESSION["user_name"]) && $_SESSION["user_name"] == "hsyntkn") {
            return $next($request);
        }

        header("Location:http://localhost:9000/login"); exit();
    }

}