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

Route::get('/Cas_Crim_Base', function () {
    return view('Cas_Crim_Base');
});
Route::get('/Human_Made', function () {
    return view('Human_Made');
});
Route::get('/Add_Criminal', function () {
    return view('Add_Criminal');
});
Route::get('/Add_Casuality', function () {
    return view('Add_Casuality');
});
Route::get('/Add_Incident', function () {
    return view('Add_Incident');
});
Route::get('/Natural', function () {
    return view('Natural');
});

Route::get('/login', function () {
    return view('Login');
});
Route::get('/Add_Incident_Base', function () {
    return view('Add_Incident_Base');
});

Route::get('/Disaster_View', function () {
    return view('Disaster_View');
});

Route::get('/info', function () {
    return view('info');
});

Route::get('/D_Causes', function () {
    return view('/D_Causes');
});

Route::get('/D_Precautions', function () {
    return view('/D_Precautions');
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

Route::get('/Base_Admin', function () {
    return view('Base_Admin');
});

Route::get('/ExistingUser', function () {
    return view('ExistingUser');
});

Route::get('/Govn_Admin', function () {
    return view('Govn_Admin');
});

Route::get('/citizen_Admin', function () {
    return view('citizen_Admin');
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


Route::post('/Add_Report', 'AddReportController@Add');

Route::post('/info_cause', 'DisasterCausesController@getCauses');

Route::post('/info_precautions', 'DisasterPrecautionsController@getPrecautions');

Route::post('/citizen_Admin', 'AddAdminController@getCitizen');

Route::post('/Govn_Admin', 'AddAdminController@getGovn');
