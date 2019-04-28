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
Route::get('/list_announcement', 'AnnouncementsController@get_list_of_Announcements');//post the form new ann
Route::get('/list_announcement_json', 'AnnouncementsController@get_list_of_Announcements_json');//post the form new ann
Route::get('/view_announcement/{id}','AnnouncementsController@get_Announcements_by_id');//edit announcment by id
Route::post('/update_announcement','AnnouncementsController@update_Announcements_by_id');//edit announcment by id

