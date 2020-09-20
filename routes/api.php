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

Route::group(['middleware' => ['guest:api']], function() {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('login/refresh', 'Auth\LoginController@refresh');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('register', 'Auth\RegisterController@register');
});

Route::group(['middleware' => ['jwt']], function() {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('me', 'Auth\LoginController@me');
    Route::apiResource('user', 'UserController');
    Route::post('change_password', 'UserController@change_password');

    Route::post('upload/file', 'UploadController@file');
    Route::post('upload/base64_image', 'UploadController@base64_image');
    Route::post('upload/delete', 'UploadController@delete');

    Route::apiResource('lugar', 'LugarController');
    Route::get('lugar/fill/{param}', 'LugarController@fill');
    Route::get('lugar/paginate/{nro_pages}', 'LugarController@paginate');
});

