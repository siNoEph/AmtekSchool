<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::resource('/adminpanel/users', 'Backend\UserController');
    Route::resource('/adminpanel/pages', 'Backend\PageController');
    Route::resource('/adminpanel/kategori', 'Backend\KategoriController');
    Route::resource('/adminpanel/gallery', 'Backend\GalleryController');
    Route::resource('/adminpanel/article', 'Backend\ArticleController');
    Route::resource('/adminpanel/staf', 'Backend\StafController');
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/adminpanel', 'Backend\AdminController@index');

	Route::get('/adminpanel/login', array('as' => 'login', 'uses' => 'Auth\AuthController@getLogin'));
	Route::post('/adminpanel/login', array('as' => 'login', 'uses' => 'Auth\AuthController@postLogin'));
	Route::get('/adminpanel/logout', array('as' => 'logout', 'uses' => 'Auth\AuthController@logout'));
	Route::get('/adminpanel/forgot', array('as' => 'forgot', 'uses' => 'Auth\PasswordController@getEmail'));
	Route::post('/adminpanel/forgot', array('as' => 'forgot', 'uses' => 'Auth\PasswordController@postEmail'));
	Route::get('/adminpanel/reset/{token}', array('as' => 'reset', 'uses' => 'Auth\PasswordController@getReset'));
	Route::post('/adminpanel/reset', array('as' => 'reset', 'uses' => 'Auth\PasswordController@postReset'));

	Route::get('/adminpanel/users/delete/{id}', 'Backend\UserController@destroy');
	Route::get('/adminpanel/pages/delete/{id}', 'Backend\PageController@destroy');
	Route::get('/adminpanel/kategori/delete/{id}', 'Backend\KategoriController@destroy');
	Route::get('/adminpanel/gallery/delete/{id}', 'Backend\GalleryController@destroy');
	Route::get('/adminpanel/gallery/deleteFoto/{id}/{file_foto}/{id_album}', 'Backend\GalleryController@deleteFoto');
    Route::get('/adminpanel/staf/delete/{id}', 'Backend\StafController@destroy');
    Route::get('/adminpanel/album/listAlbum', 'Backend\GalleryController@listAlbum');
    Route::get('/adminpanel/album/addFoto/{id}', 'Backend\GalleryController@addFoto');
    Route::get('/adminpanel/album/{id}/edit', 'Backend\GalleryController@editAlbum');
	Route::get('/adminpanel/article/delete/{id}', 'Backend\ArticleController@destroy');

	Route::post('/adminpanel/pages/insertImage', 'Backend\PageController@insertImage');
    Route::post('/adminpanel/pages/{id}/insertImage', 'Backend\PageController@insertImage');
    Route::post('/adminpanel/album/storeFoto/{id}', 'Backend\GalleryController@storeFoto');
    Route::post('/adminpanel/album/{id}', 'Backend\GalleryController@updateAlbum');
    Route::post('/adminpanel/article/insertImage', 'Backend\ArticleController@insertImage');
    Route::post('/adminpanel/article/{id}/insertImage', 'Backend\ArticleController@insertImage');

    Route::post('/adminpanel/gallery/getAlbum', 'Backend\GalleryController@getAlbum');
    Route::post('/adminpanel/gallery/getFoto', 'Backend\GalleryController@getFoto');
});
