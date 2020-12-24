<?php
Route::group([
    'middleware' => 'api',
    'prefix' => 'api',
    'namespace' => 'App\Modules\Category\Controllers',
], function () {

    Route::get('category/list', 'ApiController@categoryList');
    Route::post('category/create', 'ApiController@createCategory');
    Route::post('category/update', 'ApiController@updateCategory');
    Route::post('category/delete', 'ApiController@deleteCategory');
});
