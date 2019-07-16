<?php

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

Route::get('/todos', 'TodoController@index');// List
Route::post('/todos', 'TodoController@store');// Create
Route::get('/todos/{todo}', 'TodoController@show');// Read
Route::put('/todos/{todo}', 'TodoController@update');// Update
Route::delete('/todos/{todo}', 'TodoController@destroy');// Delete
