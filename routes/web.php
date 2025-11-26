<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HeartController;

Route::get("/", [PageController::class, "home"])->name("home");
Route::get("/catalog", [PageController::class, "catalog"])->name("catalog");
Route::get("/contacts", [PageController::class, "contacts"])->name("contacts");

Route::get("/category/{slug}", [CategoryController::class, "show"])->name("show-category");
Route::get("/product/{slug}", [ProductController::class, "show"])->name("show-product");

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");
Route::post("/logout", [AuthController::class, "logout"])->name("logout");
Route::get("/account", [AuthController::class, "account"])->middleware("auth")->name("account");

Route::get("/cart", [CartController::class, "index"])->middleware("auth")->name("cart");
Route::get("/heart", [HeartController::class, "index"])->middleware("auth")->name("heart");


