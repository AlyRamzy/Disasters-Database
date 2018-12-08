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


Route::get('/Login', function () {
    return view('Login');
});

Route::get('/Disaster_View', function () {
    return view('Disaster_View');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/Admin', function () {
    return view('Admin');
});

Route::get('/Remove_Users', function () {
    return view('Remove_Users');
});

Route::get('/Add_Admin', function () {
    return view('Add_Admin');
});

Route::get('/Citizen', function () {
    return view('Citizen');
});

Route::get('/Add_Report', function () {
    return view('Add_Report');
});

Route::get('/Asking', function () {
    return view('Asking');
});

Route::get('/Govn_Rep', function () {
    return view('Govn_Rep');
});
