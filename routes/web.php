<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class, "index"]);

Route::get("/register", [AuthController::class, "showRegister"]);
Route::get("/login", [AuthController::class, "showLogin"])->name('login');

Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);
Route::post("/logout", [AuthController::class, "logout"]);

Route::post("/posts", [PostController::class, "store"]);
Route::get("/posts/create", [PostController::class, "create"]);
Route::get("/posts/{id}", [PostController::class, 'show']);
Route::put("/posts/{post}", [PostController::class, "update"]);
Route::delete("/posts/{post}", [PostController::class, "destroy"]);
Route::get("/posts/{post}/edit", [PostController::class, "edit"])->middleware("auth");
