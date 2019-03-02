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



Route::get('/', 'HomeController@index')->name('home');
Route::get('/contactos', 'HomeController@contactos')->name('contactos');
Route::get('/terapias', 'HomeController@terapias')->name('terapias');
Route::get('/workshops', 'HomeController@workshops')->name('workshops');
Route::resource('blog', 'BlogController');



//CONTROLLER ACCESS
Route::get('/call/{command}', function($command) {
    return  Artisan::call($command);
});
Auth::routes();
