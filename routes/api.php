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

Route::get('todoLists', 'TodoListController@index');
Route::post('todoLists', 'TodoListController@store');
Route::get('todoLists/{id}', 'TodoListController@show');
Route::put('todoLists/{todoList}', 'TodoListController@markAsCompleted');
Route::post('todos', 'TodoController@store');
Route::put('todos/{todo}', 'TodoController@markAsCompleted');
