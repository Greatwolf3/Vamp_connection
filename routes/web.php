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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/master', 'HomeController@master')->name("master")->middleware('master');

    Route::get('/superadmin', 'HomeController@superadmin')->name("superadmin")->middleware('superadmin');

    Route::get('/player','HomeController@player')->name("player")->middleware('player');
    Route::get('/crea_pg','PlayerController@crea_pg')->name("crea_pg");
    Route::get('/crea_pg_admin','PlayerController@crea_pg_admin')->name("crea_pg_admin")->middleware('master');
    Route::get('/seleziona_pg_admin','PlayerController@seleziona_pg_admin')->name("seleziona_pg_admin")->middleware('master');
    Route::post('/mem_sel_pg_admin','PlayerController@mem_sel_pg_admin')->name("mem_sel_pg_admin")->middleware('master');
    Route::get('/reset_sel_pg_admin','PlayerController@reset_sel_pg_admin')->name("reset_sel_pg_admin")->middleware('master');
    Route::post('/save_pg','ApiController@save_pg')->name("save_pg");
    Route::get('/user_connection','UserController@connection')->name("user_connection");
    Route::get('/add_alleato','PlayerController@add_alleato')->name("add_alleato");
    Route::post('/save_alleato','ApiController@save_alleato')->name("save_alleato");
    Route::get('/add_contatto_generico','PlayerController@add_contatto_generico')->name("add_contatto_generico");
    Route::post('/save_contatto_generico','ApiController@save_contatto_generico')->name("save_contatto_generico");
    });
