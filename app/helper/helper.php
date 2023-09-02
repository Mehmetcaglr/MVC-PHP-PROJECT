<?php

if (!function_exists("basename_class")) {
    /**
     * @param $class
     * @return string
     */
    function class_basename($class): string
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists("view")) {
    /**
     * @param $file
     * @param array $data
     * @return void
     */
    function view($file, array $data = []): void
    {
        extract($data);
        $path = dirname(__DIR__,2)."/resource/view/".$file.".php";
        if (file_exists($path)) {
            include $path;
        }
    }
}


if (!function_exists("resource")) {
    /**
     * @param $path
     * @return void
     */
    function resource($path = null)
    {
        include dirname(__DIR__,2)."/resource/view/".$path;
    }
}

if (!function_exists("asset")) {
    /**
     * @param $path
     * @return string
     */
    function asset($path = null): string
    {
        return $_ENV["ASSET_URL"]."/$path";
    }
}

if (!function_exists("error")) {
    /**
     * @param $key
     * @return array|false|mixed
     */
    function error($key = null)
    {
        if ($key !== null) {
            return isset($_SESSION["error"][$key]) ? $_SESSION["error"][$key] : false;
        }
        return isset($_SESSION["error"]) ?  $_SESSION["error"] : [];
    }
}

if (!function_exists("old")) {
    /**
     * @param $key
     * @return mixed|string
     */
    function old($key)
    {
        return isset($_SESSION["old"][$key]) ? $_SESSION["old"][$key] : "";
    }
}

if (!function_exists("env")) {
    function env($key, $default = null)
    {
        $env_key = $key == "" ? $default : $_ENV[$key];

        return $env_key;
    }
}