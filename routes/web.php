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

Auth::routes();

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('/get_task_list/{which_tasks}', [
        'uses' => 'TaskController@get_task_list',
        'middleware' => 'roles',
        'roles' => ['Task Viewer','Task Manager','Completed Task Manager', 'Admin']
    ]);

    Route::get('/get_task_form/{task_id?}', [
        'uses' => 'TaskController@get_task_form',
        'middleware' => 'roles',
        'roles' => ['Task Manager', 'Admin']
    ]);

    Route::put('/update_task', [
        'uses' => 'TaskController@update_task',
        'middleware' => 'roles',
        'roles' => ['Task Manager', 'Admin']
    ]);

    Route::post('/add_task', [
        'uses' => 'TaskController@add_task',
        'middleware' => 'roles',
        'roles' => ['Task Manager', 'Admin']
    ]);

    Route::delete('/delete_task/{which_task}', [
        'uses' => 'TaskController@delete_task',
        'middleware' => 'roles',
        'roles' => ['Completed Task Manager', 'Admin']
    ]);

    Route::put('/publish_unpublish_task', [
        'uses' => 'TaskController@publish_unpublish_task',
        'middleware' => 'roles',
        'roles' => ['Task Manager', 'Admin']
    ]);

    Route::put('/mark_as_completed', [
        'uses' => 'TaskController@mark_as_completed',
        'middleware' => 'roles',
        'roles' => ['Task Viewer', 'Admin']
    ]);

    Route::get('/get_user_list/{which_view?}', [
        'uses' => 'UserController@get_user_list',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::put('/update_user_access', [
        'uses' => 'UserController@update_user_access',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);

    Route::delete('/delete_user/{which_user}', [
        'uses' => 'UserController@delete_user',
        'middleware' => 'roles',
        'roles' => ['Admin']
    ]);
});