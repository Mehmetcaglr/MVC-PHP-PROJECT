<?php
namespace App\Http\Middleware;

class Kernel
{
    public array $routeMiddleware = [
        "auth" => Authentication::class
    ];
}