<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function (Request $request) {
    if ($request->input("name")) {
        $nametofill = $request->input("name");
        return redirect()->route("r1",["name" => $nametofill]);
    };
    return view('welcome');
});

Route::middleware('homework')->get("/route1", function() {
    return "თქვენ შეხვედით დაცულ route_ზე";
})->name("r1");

Route::middleware("homework")->get("/route2", function() {
    return "თქვენ შეხვედით დამალულ დაცულ route_ზე";
})->name("r2");

Route::get('/error', function () {
    return "თქვენ ვერ გაიარეთ ვერიფიკაცია";
});