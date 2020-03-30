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



// Route::get('contact', function () {
//     return view('contact');
// });
// Route::get('about', function () {
//     return view('about');
// });
Route::get('auth/login',['as'=>'login','uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout',['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);
//reg routes
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

//passowrd reset 

Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset','Auth\PasswordController@reset');

//first routes

Route::get('contact','PagesController@getContact');
Route::post('contact','PagesController@postContact');
Route::get('about', 'PagesController@getAbout');

Route::get('/', 'PagesController@getIndex');


// Route::get('create', 'PostController@create');
// Route::post('create/submit', 'PostController@store');
// Route::get('show', 'PostController@show');
Route::resource('posts','PostController');
Route::resource('category','CategoryController');
Route::resource('tags','TagController');
Route::resource('comments','CommentsController');

// Route::group(['middleware'=>['web']], function () {

//  });