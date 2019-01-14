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

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/user', 'AuthController@user');
        Route::post('/refresh', 'AuthController@refresh');
        Route::post('/logout', 'AuthController@logout');
    });
});

Route::get('/cities', 'CityController@index');

Route::resource('/menus', MenuController::class);

Route::group(['prefix' => 'menus/{menu_id}'], function () {
    Route::resource('/items', MenuItemController::class);
    Route::resource('/comments', MenuCommentController::class)->middleware('auth:api');
});

Route::resource('/orders', OrderController::class);

Route::group(['prefix' => 'orders/{order_id}'], function () {
    Route::resource('/details', OrderDetailController::class);
    Route::resource('/comments', OrderCommentController::class)->middleware('auth:api');
});
