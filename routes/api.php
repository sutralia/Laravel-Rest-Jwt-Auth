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
Route::post('auth/register', 'UsersController@register');
Route::post('auth/login', 'UsersController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UsersController@getAuthUser');
    Route::get('article','ArticlesController@getArticle');

    //article
    Route::post('article/getOne','ArticlesController@getOneArticle');
    Route::post('article/update','ArticlesController@updateArticle');
    Route::delete('article/delete','ArticlesController@articleDelete');
});

