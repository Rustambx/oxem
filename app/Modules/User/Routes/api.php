<?php
Route::group([
    'middleware' => 'api',
    'prefix' => 'api',
    'namespace' => 'App\Modules\User\Controllers',
], function () {
    Route::post('signin', 'UserController@signIn');
    Route::post('signup', 'UserController@signUp');
});
