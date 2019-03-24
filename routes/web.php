<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

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



//CONTROLLER ACCESS
Route::get('/call/{command}', function($command) {
    return  Artisan::call($command);
});
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/logout', function(){
    return redirect('/')->with(Auth::logout());
});

Route::get('blog','BlogController@index')->name('blog');
Route::resource('blog', 'BlogController');
Route::get('/blog/search/{search_string}', 'BlogController@search_get')->name('search_get');

Route::post('/search', 'BlogController@search_post')->name('search_post');


Route::POST('blog/{blog}','BlogController@update')->name('update')->middleware('admin');

//only for admin
Route::group(['middleware' => ['admin']], function () {
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
});

