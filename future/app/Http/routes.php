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

Route::get('/', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

Route::get('home', [
    'uses' => 'HomeController@index',
    'as'   => 'home'
]);

// Authentication routes...
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login_show_path',
]);
Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'login_get_path'
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout'
]);

// Registration routes...
Route::get('register', [
    'uses' => 'Auth\AuthController@getRegister',
    'as'   => 'register_show_path'
]);

Route::post('register', [
    'uses' => 'Auth\AuthController@postRegister',
    'as'   => 'register_get_path'
]);


// Password reset link request routes...
Route::get('password/email', [
    'uses' => 'Auth\PasswordController@getEmail',
    'as'   => 'password_resetLink_path'
]);

Route::post('password/email', [
    'uses' => 'Auth\PasswordController@postEmail',
    'as'   => 'password_resetLink_path'
]);


//rutas de los productos

Route::get('content/{id}', [
    'uses' => 'ContentController@show',
    'as'   => 'product_show_path'
]);

Route::group(['middleware' => 'auth'], function () {

    //Rutas protegidas por el login.

    Route::get('content/{id}/details', [
        'uses' => 'ContentController@details',
        'as'   => 'product_details_path'
    ]);

    Route::post('create/content', [
        'uses' => 'ContentController@store',
        'as'   => 'product_store_path'
    ]);

    Route::get('create/content', [
        'uses' => 'ContentController@create',
        'as'   => 'product_create_path'
    ]);

    //rutas para el perfil de usuario

    Route::get('user/{id}/profile', [
        'uses' => 'UserController@show',
        'as'   => 'user_profileShow_path'
    ])->where('id', '[0-9]+');

    Route::get('user/{id}/profile/edit', [
        'uses' => 'UserController@edit',
        'as'   => 'user_edit_path'
    ])->where('id', '[0-9]+');

    Route::patch('user/{id}/profile/update', [
        'uses' => 'UserController@update',
        'as'   => 'user_update_path'
    ])->where('id', '[0-9]+');

    Route::get('user/{id}/list-user-content', [
        'uses' => 'UserController@listProducts',
        'as'   => 'user_listProducts_path'
    ])->where('id', '[0-9]+');

});

// Password reset routes...
Route::get('password/reset/{token}', [
    'uses' => 'Auth\PasswordController@getReset',
    'as'   => 'password_reset_path'
]);

Route::post('password/reset', [
    'uses' => 'Auth\PasswordController@postReset',
    'as'   => 'password_reset_path'
]);


Route::group(['namespace' => 'Api'], function()
{
    Route::resource('user', 'UserController',
        ['only' => ['index', 'store', 'update', 'destroy', 'show']]);

});

/** routes API REST using Dingo */

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'future\Http\Controllers\Api', 'middleware => VerifyAccessKey'], function($api){

        /** USERS */
        $api->get('users', 'UserController@index');
        $api->post('users', 'UserController@store');
        $api->put('users', 'UserController@update');
        $api->delete('users', 'UserController@destroy');

        /** CONTENTS */
        $api->get('contents', 'ContentController@index');
        $api->post('contents', 'ContentController@store');
        $api->put('contents', 'ContentController@update');
        $api->delete('contents', 'ContentController@destroy');


    });
});