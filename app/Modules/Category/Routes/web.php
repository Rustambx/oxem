<?php
Route::group([
    'middleware' => ['web', 'auth'],
    'prefix' => 'categories',
    'namespace' => 'App\Modules\Category\Controllers',

], function () {
    Route::get('/', 'CategoryController@index')->name('category.index');
    Route::get('/create', 'CategoryController@create')->name('category.create');
    Route::post('/store', 'CategoryController@store')->name('category.store');
    Route::get('/edit/{category}', 'CategoryController@edit')->name('category.edit');
    Route::put('/update/{category}', 'CategoryController@update')->name('category.update');
    Route::delete('/delete/{category}', 'CategoryController@destroy')->name('category.destroy');
});
