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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//
//Route::post('/addCategory' , 'CategoryController@create');
//Route::put('/updateCategory/{id}' , 'CategoryController@update');
//Route::delete('/deleteCategory/{id}' , 'CategoryController@delete');
//Route::get('/getAllCategory' , 'CategoryController@getAll');
//
//Route::post('/addItem' , 'ItemController@create');
//Route::post('/addOrder' , 'OrderController@create');
//Route::post('/store' , 'FileController@store');
//Route::get('/store' , 'FileController@store');
//Route::get('/showImages' , 'FileController@showImages');
//Route::post('/user/create', 'AuthController@register');

//Route::group([
//    'prefix' => 'auth'
//
//], function () {
//
//    Route::post('add', 'AuthController@register');
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//    Route::post('me', 'AuthController@me');
//
//
    Route::post('/item/addItem' , 'ItemController@create');
    Route::post('/item//update/{id}' , 'ItemController@update');
    Route::delete('/item/delete/{id}' , 'ItemController@delete');
    Route::get('item/getAll' , 'ItemController@getAll');

    Route::post('/category/create' , 'CategoryController@create');
    Route::post('/category//update/{id}' , 'CategoryController@update');
    Route::delete('/category/delete/{id}' , 'CategoryController@delete');
    Route::get('/category/getAll' , 'CategoryController@getAll');

    Route::post('/colors/create' , 'ColorsController@create');
    Route::post('/colors//update/{id}' , 'ColorsController@update');
    Route::delete('/colors/delete/{id}' , 'ColorsController@delete');
    Route::get('/colors/getAll' , 'ColorsController@getAll');

    Route::post('/delivery/create' , 'DeliveryController@create');
    Route::post('/delivery//update/{id}' , 'DeliveryController@update');
    Route::delete('/delivery/delete/{id}' , 'DeliveryController@delete');
    Route::get('/delivery/getAll' , 'DeliveryController@getAll');

    Route::post('/order/create' , 'OrderController@create');
    Route::post('/order//update/{id}' , 'OrderController@update');
    Route::delete('/order/delete/{id}' , 'OrderController@delete');
    Route::get('/order/getAll' , 'OrderController@getAll');

    Route::post('/order-detail/create' , 'OrderDetailController@create');
    Route::post('/order-detail//update/{id}' , 'OrderDetailController@update');
    Route::delete('/order-detail/delete/{id}' , 'OrderDetailController@delete');
    Route::get('/order-detail/getAll' , 'OrderDetailController@getAll');

    Route::post('/seller/create' , 'SellerController@create');
    Route::post('/seller//update/{id}' , 'SellerController@update');
    Route::delete('/seller/delete/{id}' , 'SellerController@delete');
    Route::get('/seller/getAll' , 'SellerController@getAll');

    Route::post('/size/create' , 'SizeController@create');
    Route::post('/size//update/{id}' , 'SizeController@update');
    Route::delete('/size/delete/{id}' , 'SizeController@delete');
    Route::get('/size/getAll' , 'SizeController@getAll');

    Route::post('/sub-category/create' , 'SubCategoryController@create');
    Route::post('/sub-category//update/{id}' , 'SubCategoryController@update');
    Route::delete('/sub-category/delete/{id}' , 'SubCategoryController@delete');
    Route::get('/sub-category/getAll' , 'SubCategoryController@getAll');
//
//});
//Route::post('/register', 'AuthController@register');
