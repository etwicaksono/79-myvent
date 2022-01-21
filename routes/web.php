<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('my-events', ["title" => "Home", "data" => [
        [
            "img"
        ]
    ]]);
});

Route::get("add-event", function () {
    return view("add-event");
});

Route::get("dashboard", function () {
    return view("dashboard");
});