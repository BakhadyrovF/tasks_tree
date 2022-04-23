<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => '\App\Http\Controllers'], function () {
    Route::get('/tasks', 'TaskController@index')->name('tasks.index');
    Route::get('/tasks/all-children/{id}', 'TaskController@showWithAllChildren')->name('tasks.show-with-all-children');
    Route::get('/tasks/{id}', 'TaskController@show')->name('tasks.show');
});
