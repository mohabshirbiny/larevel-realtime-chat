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


Route::get('/sender', function () {
    event(new \App\Events\Chat('Salam Alikom'));
    return ['success'];
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Broadcast::channel('App.User.{Id}', function ($user, $id) { 
    return (int) $user->id === (int) $id; 
});
