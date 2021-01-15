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

Route::post('form', 'Form\FormController@store');
Route::post('login', 'Admin\UserController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('newUser', 'Admin\UserController@store');
    Route::get('guardian/{entries}{page?}', 'Form\GuardianController@index');
});
