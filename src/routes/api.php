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



Route::group(['prefix' => 'v01', 'as' => 'v01'], function () {
    
    Route::group(['prefix' => 'auth', 'as' => 'auth'], function () {

        Route::post('/register', 'App\Http\Controllers\Api\V01\Auth\AuthController@register')->name('register');

        Route::post('/login', 'App\Http\Controllers\Api\V01\Auth\AuthController@login')->name('login');

        Route::post('/logout', 'App\Http\Controllers\Api\V01\Auth\AuthController@logout')->name('logout');
    
        Route::middleware('sanctum:api')->get('/user', function (Request $request) {
            return $request->user();
        });
    });

    Route::group(['prefix' => 'chanels', 'as' => 'chanels'], function () {

        Route::get('/', 'App\Http\Controllers\Api\V01\Chanel\ChanelController@chanels');

        Route::post('/create', 'App\Http\Controllers\Api\V01\Chanel\ChanelController@create')->name('create');

        Route::put('/edit', 'App\Http\Controllers\Api\V01\Chanel\ChanelController@edit')->name('edit');

        Route::delete('/delete', 'App\Http\Controllers\Api\V01\Chanel\ChanelController@delete')->name('delete');
    });
});
