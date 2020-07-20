<?php

use App\Http\Controllers\PagesController;
use App\Raza;
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
Route::get('caballos','PagesController@caballos')->name('listadoCaballos');
;

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
    Route::get('anuncios/venta','AnunciosController@index')->name('admin.anuncios.index');
    Route::post('anuncios','AnunciosController@store')->name('admin.anuncios.store');
    Route::get('anuncios/{anuncio}','AnunciosController@edit')->name('admin.anuncios.edit');
    Route::delete('anuncios/{anuncio}','AnunciosController@destroy')->name('admin.anuncios.destroy');
    Route::put('anuncios/{anuncio}','AnunciosController@update')->name('admin.anuncios.update');

    Route::get('caballos/miscaballos','CaballosController@index')->name('admin.caballos.index');
    Route::get('caballos/create','CaballosController@create')->name('admin.caballos.create');
    Route::post('caballos','CaballosController@store')->name('admin.caballos.store');
   /*  Route::put('caballos/{caballo}','CaballosController@update')->name('admin.caballos.update'); */
    Route::get('caballos/{caballo}','CaballosController@edit')->name('admin.caballos.edit');

    Route::put('caballos/{caballo}','CaballosController@update')->name('admin.caballos.update');
   
    
    Route::delete('caballos/{caballo}','CaballosController@destroy')->name('admin.caballos.destroy');
    Route::post('caballos/{caballo}/photos','PhotosController@store')->name('admin.caballos.photos.store');
   
    
    


    Route::delete('photos/{photo}', 'PhotosController@destroy')->name('admin.photos.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
