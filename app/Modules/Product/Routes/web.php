<?php

Route::group([
    'middleware' => ['web', 'auth'],
    'prefix' => 'products',
    'namespace' => 'App\Modules\Product\Controllers',

], function () {
    Route::get('/', 'ProductController@index')->name('product.index');
    Route::get('/create', 'ProductController@create')->name('product.create');
    Route::post('/store', 'ProductController@store')->name('product.store');
    Route::get('/edit/{product}', 'ProductController@edit')->name('product.edit');
    Route::put('/update/{product}', 'ProductController@update')->name('product.update');
    Route::delete('/delete/{product}', 'ProductController@destroy')->name('product.destroy');
});
