<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Request\Request;

interface IMiddleware
{
    public function handle(Closure $next, Request $request);


}