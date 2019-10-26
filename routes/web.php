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
//test
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/new_announcement', 'AnnouncementsController@new_Announcements');//get the page to post
Route::post('/new_announcement', 'AnnouncementsController@add_new_Announcements');//post the form new ann

Route::get('/view_announcement/{id}','AnnouncementsController@get_Announcements_by_id');//edit announcment by id
Route::post('/update_announcement','AnnouncementsController@update_Announcements_by_id');//edit announcment by id

//Announcements
Route::get('/list_announcement', 'AnnouncementsController@get_list_of_Announcements');//post the form new ann
Route::get('/list_announcement_json', 'AnnouncementsController@get_list_of_Announcements_json');//post the form new ann

//worker_list
Route::get('/add_new_worker' , "SettingsController@add_new_worker");
Route::post('/new_worker' , "SettingsController@new_worker_post");
Route::get('/worker_list' , "SettingsController@worker_list");
Route::get('/worker_list_json' , "SettingsController@worker_list_json");
Route::get('/worker_settings/{id}' , "SettingsController@workerDetails");


//objections with problems
Route::get('/list_problem_objections' , "Problem_objections@getAllProblemsObjections");
Route::get('/view_objection_details/{id}' , "Problem_objections@getObjectionById");
Route::get('/view_problem_details/{id}' , "Problem_objections@getProblemById");
Route::post('/objectionProcessed' , "Problem_objections@objectionProcessed");
Route::post('/objection_hahlata' , "Problem_objections@objection_hahlata");
Route::post('/update_problem_status' , "Problem_objections@update_problem_status");

//objections list json
Route::get('/getObjections_json' , "Problem_objections@getObjections_json");
//problems list json
Route::get('/getProblems_json' , "Problem_objections@getProblems_json");

//users requests
Route::get('/users_requests' , "UserRequests@getAllUserRequests");
Route::get('/users_requests_json' , "UserRequests@getAllUserRequests_json");
Route::get('/view_request_details/{id}' , "UserRequests@getRequestById");
Route::post('/update_request_details/' , "UserRequests@update_RequestById");

//app_users_list
Route::get('/app_users_list' , "AppUsers@appUsersList");
Route::get('/app_users_list_json' , "AppUsers@appUsersList_json");
Route::get('/view_app_user/{id}' , "AppUsers@getAppUserDetailsByID");
