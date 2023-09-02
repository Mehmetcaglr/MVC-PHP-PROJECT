<?php
ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
ob_start();
session_start();
include __DIR__ . "/vendor/autoload.php";

use App\Http\Controllers\Home\HomeController;
use Routers\Route;
use App\Http\Controllers\Books\BookController;
use App\Http\Controllers\Employee\EmployeeController;
use Dotenv\Dotenv;
use App\Http\Controllers\User\UserController;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

Route::get("/home", [HomeController::class, "index"]);





Route::get("/employee", [EmployeeController::class, "index"]);
Route::get("/employee/{id}", [EmployeeController::class, "edit"]);
//Route::post("/employeee", [EmployeeController::class, "index"]);

Route::get("/user", [UserController::class, "index"]);
Route::get("/user/create", [UserController::class, "create"]);
Route::post("/user/save", [UserController::class, "save"]);
Route::get("/user/edit/{id}", [UserController::class, "edit"]);
Route::post("/user/update/{id}", [UserController::class, "update"]);
Route::post("/user/delete/{id}", [UserController::class, "delete"]);

Route::get("/book", [BookController::class, "index"]);
Route::get("/book/create", [BookController::class, "create"]);
Route::post("/book/save", [BookController::class, "store"]);

Route::get("/login", function (){
    echo "<h1>Login Page</h1>";
});

Route::get("/", function () {
    $_SESSION["user_name"] = "hsyntkn";
});