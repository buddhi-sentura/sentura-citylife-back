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

Route::post('register', 'UserContraller@register');
Route::post('login', 'UserContraller@login');
Route::post('logout', 'UserContraller@logout');
Route::post('refresh', 'UserContraller@refresh');
Route::post('me', 'UserContraller@me');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['jwt.auth']], function(){
    Route::post('/item/addItem' , 'ItemController@create');
    Route::post('/item//update/{id}', 'ItemController@update');
    Route::delete('/item/delete/{id}', 'ItemController@delete');
    Route::get('item/getAll', 'ItemController@getAll');

    Route::post('/category/create', 'CategoryController@create');
    Route::post('/category//update/{id}', 'CategoryController@update');
    Route::delete('/category/delete/{id}', 'CategoryController@delete');
    Route::get('/category/getAll', 'CategoryController@getAll');

    Route::post('/colors/create', 'ColorsController@create');
    Route::post('/colors//update/{id}', 'ColorsController@update');
    Route::delete('/colors/delete/{id}', 'ColorsController@delete');
    Route::get('/colors/getAll', 'ColorsController@getAll');

    Route::post('/delivery/create', 'DeliveryController@create');
    Route::post('/delivery//update/{id}', 'DeliveryController@update');
    Route::delete('/delivery/delete/{id}', 'DeliveryController@delete');
    Route::get('/delivery/getAll', 'DeliveryController@getAll');

    Route::post('/order/create', 'OrderController@create');
    Route::post('/order//update/{id}', 'OrderController@update');
    Route::delete('/order/delete/{id}', 'OrderController@delete');
    Route::get('/order/getAll', 'OrderController@getAll');

    Route::post('/order-detail/create', 'OrderDetailController@create');
    Route::post('/order-detail//update/{id}', 'OrderDetailController@update');
    Route::delete('/order-detail/delete/{id}', 'OrderDetailController@delete');
    Route::get('/order-detail/getAll', 'OrderDetailController@getAll');

    Route::post('/seller/create', 'SellerController@create');
    Route::post('/seller//update/{id}', 'SellerController@update');
    Route::delete('/seller/delete/{id}', 'SellerController@delete');
    Route::get('/seller/getAll', 'SellerController@getAll');

    Route::post('/size/create', 'SizeController@create');
    Route::post('/size//update/{id}', 'SizeController@update');
    Route::delete('/size/delete/{id}', 'SizeController@delete');
    Route::get('/size/getAll', 'SizeController@getAll');

    Route::post('/sub-category/create', 'SubCategoryController@create');
    Route::post('/sub-category//update/{id}', 'SubCategoryController@update');
    Route::delete('/sub-category/delete/{id}', 'SubCategoryController@delete');
    Route::get('/sub-category/getAll', 'SubCategoryController@getAll');
});
