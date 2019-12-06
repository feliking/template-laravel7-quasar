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
    Route::put('profile', 'ProfileController@update');

    Route::apiResource('ciudad', 'CiudadController');
    Route::get('ciudad/fill/{param}', 'CiudadController@fill');

    Route::apiResource('lugar', 'LugarController');
    Route::get('lugar/fill/{param}', 'LugarController@fill');

    Route::apiResource('delegado', 'DelegadoController');
    Route::get('delegado/fill/{param}', 'DelegadoController@fill');

    Route::apiResource('sector', 'SectorController');
    Route::get('sector/fill/{param}', 'SectorController@fill');

    Route::apiResource('institucion', 'InstitucionController');
    Route::get('institucion/fill/{param}', 'InstitucionController@fill');

    Route::apiResource('evento', 'EventoAcademicaaController');
    Route::get('evento/fill/{param}', 'EventoController@fill');
});

