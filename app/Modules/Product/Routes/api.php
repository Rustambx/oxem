<?php
Route::group([
    'middleware' => 'api',
    'prefix' => 'api',
    'namespace' => 'App\Modules\Product\Controllers',
], function () {

    Route::post('products/list', 'ApiController@productList');
    Route::post('category/products', 'ApiController@categoryProducts');
    Route::post('product/show', 'ApiController@showProduct');
    Route::post('product/create', 'ApiController@createProduct');
    Route::post('product/delete', 'ApiController@deleteProduct');
});
