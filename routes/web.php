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
Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add');
    Route::get('proflie/create','Admin\ProfileController@add');
});

//ch9-3課題
//Route::group(['prefix' => 'XXX'],function(){
  //Route::get('news/create','Admin\AAAController@bbb');
//});

//ch9-4
Route::group(['prefix' => 'admin'],function(){
  Route::get('profile/create','Admin\ProfileController@add');
  Route::get('profile/edit','Admin\ProfileController@edit');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'],function(){
  //news
  Route::get('news/create','Admin\NewsController@add')->middleware('auth');
  Route::get('news','Admin\NewsController@index')->middleware('auth');
  Route::get('news/edit','Admin\NewsController@edit')->middleware('auth');
  Route::post('news/edit','Admin\NewsController@update')->middleware('auth');
  Route::get('news/delete','Admin\NewsController@delete')->middleware('auth');
//profile
  Route::get('profile/create','Admin\ProfileController@add')->middleware('auth');
  Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
  Route::get('profile','Admin\ProfileController@index')->middleware('auth');
  Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
  Route::post('profile/edit','Admin\ProfileController@update')->middleware('auth');
  Route::get('profile/delete','Admin\ProfileController@delete')->middleware('auth');
    
    
});

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
  //news
  Route::get('news/create','Admin\NewsController@add');
  Route::post('news/create','Admin\NewsController@create');
  
  //profile
  Route::post('profile/create','Admin\ProfileController@create');
  Route::post('profile/edit','Admin\ProfileController@update');
});

Route::get('/','NewsController@index');
Route::get('/profile','ProfileController@index');
