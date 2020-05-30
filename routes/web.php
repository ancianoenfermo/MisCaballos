<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','PagesController@home')->name('home');

Route::get('admin','PagesController@admin')->name('admin');

/* Route::get('/', function () {
    return view('welcome');
}) */;


/* Route::get('admin',function(){
    return view('admin.paneldecontrol');
});
 */

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
     'middelware' => 'auth'],
    function() {
    Route::get('caballos','CaballosController@index')->name('admin.caballos.index');
    Route::get('caballos/create','CaballosController@create')->name('admin.caballos.create');
    Route::get('vans','VansController@index')->name('admin.vans.index');
    Route::get('vans/create','VansController@create')->name('admin.vans.create');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
