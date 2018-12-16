<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('details', 'UserController@details');

    // CATEGORY
    Route::get('categories', 'CategoryController@index');
    Route::get('categories/{category}', 'CategoryController@show');
    Route::post('categories', 'CategoryController@store');
    Route::put('categories/{category}', 'CategoryController@update');
    Route::delete('categories/{category}', 'CategoryController@delete');

    // EXPENSE
    Route::get('expenses', 'ExpenseController@index');
    Route::get('expenses/{expense}', 'ExpenseController@show');
    Route::post('expenses', 'ExpenseController@store');
    Route::put('expenses/{expense}', 'ExpenseController@update');
    Route::delete('expenses/{expense}', 'ExpenseController@delete');
});

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');