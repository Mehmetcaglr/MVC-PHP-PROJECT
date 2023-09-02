<?php

namespace Routers;

use App\Http\Middleware\Authentication;
use App\Http\Middleware\Kernel;
use App\Http\Middleware\Middleware;
use App\Http\Request\Request;

//extract();
class Route
{
    /**
     * @var array
     */
    private static array $routes = [];

    /**
     * @var string
     */
    private static string $method = '';

    /**
     * @var string[]
     */
    private static  $patterns = [
        '{url}' => '([0-9a-zA-Z-]+)',
        '{id}' => '([0-9]+)',
    ];

    private static $methods = ['POST', 'GET'];

    /**
     * @param string $url
     * @param \Closure|string|array $callback
     * @param $parameters
     * @return void
     */
    public static function get(string $url, \Closure|string|array $callback, $parameters = null)
    {
        $request = new Request();
        self::run($url, $callback, $request);
    }

    /**
     * @param string $url
     * @param \Closure|string|array $callback
     * @param $parameters
     * @return void
     */
    public static function post(string $url, \Closure|string|array $callback, $parameters = null)
    {
        $request = new Request();
        self::run($url, $callback, $request);
    }

    /**
     * @return array|string|string[]
     */
    public static function parseUrl()
    {
        $dirname = dirname($_SERVER['SCRIPT_NAME']);
        $dirname = $dirname != '/' ? $dirname : null;
        $basename = basename($_SERVER['SCRIPT_NAME']);
        $requestUri = @str_replace([$dirname, $basename], null, $_SERVER['REQUEST_URI']);
        if (strrpos($requestUri, "?")) {
            $sttrPosCount = strrpos($requestUri, "?");
            $requestUri = substr($requestUri,0, $sttrPosCount);
        }

        if ($requestUri === "/")
            return $requestUri;

        return rtrim($requestUri,"/");
    }

    /**
     * @param $url
     * @param $callback
     * @param $method
     * @return Route|void
     */
    public static function run($url, $callback, Request $request)
    {
        $url = str_replace(array_keys(self::$patterns), array_values(self::$patterns), $url);
        $parseUrl = self::parseUrl();

        if (preg_match('@^'.$url.'$@', $parseUrl, $parameters))
        {
            if (!self::checkeMethod()) {
                self::messages("method");
            }

            unset($parameters[0]);

            $params = isset($parameters[1]) ? $parameters[1] : null;

            //print_r($parameters);die;
            if (is_callable($callback))
            {

                echo call_user_func_array($callback,  [$request, $params]);

            }

            if (is_array($callback))
            {
                $filePath = strtr(lcfirst($callback[0]), "\\", "/");
                $controllerPath = __DIR__."/../".$filePath.".php";

                if (file_exists($controllerPath))
                {
                    echo call_user_func_array([new $callback[0],  $callback[1]], [$request, $params]);
                }
            }

            if (is_string($callback))
            {
                $callback = explode("@", $callback);
                $filePath = strtr(lcfirst($callback[0]), "\\", "/");
                $controllerPath = __DIR__."/../".$filePath.".php";
                if (file_exists($controllerPath))
                {
                    echo call_user_func_array([new $callback[0],  $callback[1]],  [$request, $params]);
                }

            }

            return new self();
        }
    }

    /**
     * @param string|null $key
     * @return Route
     */
    public static function middleware(string $key = null)
    {
        $kernel = new Kernel();
        $request = new Request();
        Middleware::call(new $kernel->routeMiddleware[$key], function ($requst){}, $request);

        return new self();
    }

    /**
     * @return void
     */
    public static function methodType()
    {
        return self::$method = $_SERVER["REQUEST_METHOD"];
    }

    public static function checkeMethod()
    {
        if (in_array(self::methodType(), self::$methods)) {
            return true;
        }

        return false;
    }

    public static function messages($key)
    {
        $messages =  ['method' => "not found method"];
        echo $messages[$key];
        die;
    }

}