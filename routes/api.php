<?php

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

//Return all the todo's belonging to a specific user
Route::get('todo', 'ToDoController@index');

//Return a single todo per user
Route::get('todo/{id}', 'ToDoController@show');

//Create new todo
Route::post('todo', 'ToDoController@store');

//Update todo for user
Route::put('todo','TodoController@store');

//Delete todo for a user
Route::delete('todo/{id}', 'ToDoController@destroy');