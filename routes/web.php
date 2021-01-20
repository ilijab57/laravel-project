<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/topic/create', 'TopicController@create');
Route::post('/topic/store','TopicController@store');
Route::get('/topic/show','TopicController@show');
Route::get('/topic/edit/{id}','TopicController@edit');
Route::put('/topic/update/{id}','TopicController@update');
Route::delete('/topic/delete/{id}','TopicController@destroy');
Route::get('/topic/show/{id}','TopicController@show');
Route::post('/topic/comment','TopicController@comment');


Route::get('/admin','AdminController@list')->middleware('admin');
Route::get('/admin/edit/{id}','AdminController@edit')->middleware('admin');
Route::put('/admin/update/{id}','AdminController@update')->middleware('admin');
Route::delete('/admin/delete/{id}','AdminController@destroy')->middleware('admin');
Route::get('admin/aprove/{id}','AdminController@aprove')->middleware('admin');