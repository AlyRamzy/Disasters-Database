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
//Route::get('/Human_Made', function () {
  //  return view('Human_Made');
//});
Route::get('/Human_Made','IncidentController@humanmade');
Route::post('/Human_Made','IncidentController@Addhumanmade');
Route::get('/Natural','IncidentController@natural');
Route::post('/Natural','IncidentController@Addnatural');
Route::get('/Add_Criminal', function () {
    return view('Add_Criminal');
});
Route::get('/Add_Casuality', function () {
    return view('Add_Casuality');
});
Route::get('/Add_Incident', function () {
    return view('Add_Incident');
});
//Route::get('/Natural', function () {
  //  return view('Natural');
//});

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

Route::get('/Admin', function () {
    return view('Admin');
});

//Route::get('/Remove_Users', function () {
    
  //  return view('Remove_Users');
//});
Route::get('/Profile_Govn_Rep','Profile@GovRep');
Route::get('/Profile_Admin','Profile@Admin');
Route::get('/Profile_Citizent','Profile@Citizent');


Route::post('/Remove_Users','RemoveUser@Remove');
Route::get('/Remove_Users','RemoveUser@MakeViewRemove');

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
