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


Route::group(['prefix' => 'admin', 'middleware' => 'auth.checkrole:admin', 'as' => 'admin.'], function() {
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

    Route::group(['prefix' => 'clients', 'as' => 'clients.'], function() {
        Route::get('/', ['uses' => 'ClientsController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'ClientsController@create', 'as' => 'create']);
        Route::get('edit/{id}', ['uses' => 'ClientsController@edit', 'as' => 'edit']);
        Route::get('destroy/{id}', ['uses' => 'ClientsController@destroy', 'as' => 'destroy']);
        Route::post('store', ['uses' => 'ClientsController@store', 'as' => 'store']);
        Route::post('update/{id}', ['uses' => 'ClientsController@update', 'as' => 'update']);
    });

    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function() {
        Route::get('/', ['uses' => 'OrdersController@index', 'as' => 'index']);
        Route::get('edit/{id}', ['uses' => 'OrdersController@edit', 'as' => 'edit']);
        Route::post('update/{id}', ['uses' => 'OrdersController@update', 'as' => 'update']);
    });

    Route::group(['prefix' => 'cupons', 'as' => 'cupons.'], function() {
        Route::get('/', ['uses' => 'CuponsController@index', 'as' => 'index']);
        Route::get('create', ['uses' => 'CuponsController@create', 'as' => 'create']);
        Route::get('edit/{id}', ['uses' => 'CuponsController@edit', 'as' => 'edit']);
        Route::get('destroy/{id}', ['uses' => 'CuponsController@destroy', 'as' => 'destroy']);
        Route::post('store', ['uses' => 'CuponsController@store', 'as' => 'store']);
        Route::post('update/{id}', ['uses' => 'CuponsController@update', 'as' => 'update']);
    });
});

Route::group(['prefix' => 'customer', 'as' => 'customer.', 'middleware' => 'auth.checkrole:client'], function() {

    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'CheckoutController@index']);
        Route::get('create', ['as' => 'create', 'uses' => 'CheckoutController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'CheckoutController@store']);
    });
});

Route::group(['prefix' => 'api', 'middleware' => 'oauth', 'as' => 'api.'], function() {

    Route::group(['prefix' => 'client','middleware' => 'oauth.checkrole:client', 'as' => 'client.'], function() {
        Route::get('pedidos', function() {
            return [
                'id' => 1,
                'client' => 'Salustiano - Cliente',
                'total' => 10
            ];
        });
    });

    Route::group(['prefix' => 'deliveryman','middleware' => 'oauth.checkrole:deliveryman', 'as' => 'deliveryman.'], function() {
        Route::get('pedidos', function() {
            return [
                'id' => 1,
                'client' => 'Salustiano - Entregador',
                'total' => 10
            ];
        });
    });
});

Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});