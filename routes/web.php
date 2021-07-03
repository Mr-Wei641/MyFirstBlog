<?php

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
    return view('welcome');
});
Route::get('about', function () {
    return view('home.about');
});
Route::get('contact', function () {
    return view('home.contact');
});
Route::get('single', function () {
    return view('home.single');
});

include base_path('routes/admin/admin.php');