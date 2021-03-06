<?php

use App\Http\Controllers\EventController;
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

// Route::get('/', [EventController::class, "index"]);
Route::get('/', function () {
    return view('my-events', ["title" => "Home"]);
});

Route::get("add-event", [EventController::class, "create"]);

Route::get("dashboard", [EventController::class, "dashboard"]);

Route::get("select2-user", [EventController::class, "getSelect2ForUser"]);

Route::resource("event", EventController::class);

Route::get("json", [EventController::class, "getEvents"])->name("events.data");

Route::get("list-events", [EventController::class, "index"])->name("events.list-data");