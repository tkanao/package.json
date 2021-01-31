<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// admin/profile/create => ProfileController@add
// Route::get('admin/profile/create', 'Admin\ProfileController@add');

// admin/profile/edit => ProfileController@edit
// Route::get('admin/profile/edit', 'Admin\ProfileController@edit');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// いらない？
// Route::group(['prefix' => 'admin'], function() {
//     Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
// });

// Route::group(['prefix' => 'admin'], function() {
//     Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
// });

// Route::group(['prefix' => 'admin'], function() {
//     Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // NewsController
    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');
    Route::get('news', 'Admin\NewsController@index');
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');
    Route::get('news/delete', 'Admin\NewsController@delete');
    
    // ProfileController
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit');


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'NewsController@index');
Route::get('/profile', 'ProfileController@index');
