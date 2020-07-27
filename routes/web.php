<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Report;

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

Route::get('/', 'ReportController@index');

Route::get('/welcome', 'TestController@index');

Route::post('/welcome', 'TestController@insert');

Route::get('/test', function() {
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'UserController@index')->name('user_index');
    Route::get('/info/{id}', 'UserController@show')->name('user_show');


    Route::get('/create', 'UserController@create')->name('user_create_post');
    Route::post('/create', 'UserController@createPost')->name('user_create');


    Route::get('/update/{id}', 'UserController@update')->name('user_update_post');
    Route::post('/update/{id}', 'UserController@updatePost')->name('user_update');

    Route::get('/delete/{id}', 'UserController@delete')->name('user_delete');

});


Route::group(['prefix' => 'project'], function () {
    Route::get('/', 'ProjectController@index')->name('project_index');
    Route::get('/info/{id}', 'ProjectController@show')->name('project_info');


    Route::get('/create', 'ProjectController@create')->name('project_create');
    Route::post('/create', 'ProjectController@createPost')->name('project_create_post');


    Route::get('/update/{id}', 'ProjectController@update')->name('project_update');
    Route::post('/update/{id}', 'ProjectController@updatePost')->name('project_update_post');

    Route::get('/delete/{id}', 'ProjectController@delete')->name('project_delete');

    Route::get('/assign/{id}', 'ProjectController@assign')->name('project_assign');
    Route::post('/assign/{id}', 'ProjectController@assignPost')->name('project_assign_post');

});

Route::get('/report', 'ReportController@index');

