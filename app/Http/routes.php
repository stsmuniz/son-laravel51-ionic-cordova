<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole', 'as' => 'admin.'], function() {
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', ['uses' => 'CategoriesController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'CategoriesController@create', 'as' => 'create']);
        Route::get('edit/{id}', ['uses' => 'CategoriesController@edit', 'as' => 'edit']);
        Route::get('destroy/{id}', ['uses' => 'CategoriesController@destroy', 'as' => 'destroy']);
        Route::post('store', ['uses' => 'CategoriesController@store', 'as' => 'store']);
        Route::post('update/{id}', ['uses' => 'CategoriesController@update', 'as' => 'update']);
    });

    Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
        Route::get('/', ['uses' => 'ProductsController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'ProductsController@create', 'as' => 'create']);
        Route::get('edit/{id}', ['uses' => 'ProductsController@edit', 'as' => 'edit']);
        Route::get('destroy/{id}', ['uses' => 'ProductsController@destroy', 'as' => 'destroy']);
        Route::post('store', ['uses' => 'ProductsController@store', 'as' => 'store']);
        Route::post('update/{id}', ['uses' => 'ProductsController@update', 'as' => 'update']);
    });
});

