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
Route::get('/update',  'ApiController@updateStation');
//Route::get('/update_glofas',  'ApiController@updateGlofas');
Route::get('/routine_glofas',  'ApiController@routine_glofas');
Route::get('/check_level', 'ApiController@check_level')->name('check_level');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
//Route::get('/', 'HomeController@index')->name('home');
        Route::get('/prova', function () {
            Artisan::call('cache:clear');
            Artisan::call('view:clear');
            Artisan::call('config:clear');
            return view('prova');
        });
        Route::get('/', 'HomeController@index')->name('home');


        Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/scenarios', 'ApiController@j_get_scenarios')->name('scenarios');
        Route::get('/stations', 'ApiController@j_get_stations')->name('stations');
        Route::get('/stations/kobo', 'ApiController@j_get_stations_kobo')->name('stations_kobo');
        Route::get('/wms', 'ApiController@j_get_wms')->name('wms');
        Route::get('/get_scenarios/{alert}', 'ApiController@get_scenarios_by_alert')->name('scenario_by_alert');
        Route::get('/check_level', 'ApiController@check_level')->name('check_level');
        Route::get('/init_level', 'ApiController@init_level')->name('init_level');
        Route::get('/get_level', 'ApiController@get_level')->name('get_level');
        Route::get('/search_level/{value}', 'ApiController@search_level')->name('search_level');
    /*    Route::match(['get', 'post'], 'login', function(){
            return redirect('/');
        });*/
        Route::get('pag_projet_anadia', 'PageController@page_anadia')->name('page_anadia');
        Route::get('pag_systeme', 'PageController@page_systeme')->name('page_systeme');
        Route::get('pag_mecanisme', 'PageController@page_mecanisme')->name('page_mecanisme');
        Route::get('pag_scenarios', 'PageController@page_scenarios')->name('page_scenarios');
        Route::get('pag_previsions', 'PageController@page_previsions')->name('page_previsions');
        Route::get('pag_observees', 'PageController@page_observees')->name('page_observees');
        Route::get('pag_opendata', 'PageController@page_anadia')->name('page_opendata');
        Route::get('pag_reduction', 'PageController@page_reduction')->name('page_reduction');
        Route::get('pag_liens', 'PageController@page_liens')->name('page_liens');
        Route::get('pag_opendata', 'PageController@page_opendata')->name('page_opendata');
        Route::get('pag_information', 'PageController@page_information')->name('page_information');
        Route::get('pag_geoservices', 'PageController@page_geoservices')->name('page_geoservices');
        Route::get('/infoip', 'ApiController@info_ip')->name('infoip');
        Route::get('logout', 'Auth\LoginController@logout');

        Route::get('/send_email', 'ApiController@send_email')->name('send_email');
        Route::get('/generate-pdf','ApiController@generatePDF');
        Route::get('/kobo', 'ApiController@kobo')->name('kobo');
        Route::group(
            ['middleware' => ['auth'],
                'prefix' => 'user',
            ], function () {
         //   Route::get('/generate-pdf','ApiController@generatePDF');
          //  Route::get('/check_level', 'ApiController@check_level')->name('check_level');
           // Route::get('/send_email', 'ApiController@send_email')->name('send_email');
        });

        Route::group(
            ['prefix' => 'admin','middleware' => ['auth']], function () {
            Route::get('/dashboard', 'AdminController@index')->name('home_admin')->middleware('admin');
            Route::get('/form_email_admin/{id_station_monte}/{id_station_valle}', 'AdminController@generate_bulletin')->name('generate_bulletin_admin')->middleware('admin');
            Route::post('/send_email_admin', 'AdminController@send_email')->name('send_email_admin')->middleware('admin');
            Route::get('/save_csv_base', 'AdminController@save_csv_base')->name('save_csv_base')->middleware('admin');
            Route::post('/save_img', 'AdminController@save_img')->name('save_img')->middleware('admin');
            Route::post('/save_bullettin', 'AdminController@save_bullettin')->name('save_bullettin')->middleware('admin');
            //Route::get('/save_bullettin', 'AdminController@save_bullettin')->name('save_bullettin')->middleware('admin');

        });
        Route::group(
            ['prefix' => 'user',], function () {
            Route::get('/dashboard', 'UserController@index')->name('home_user')->middleware('user');
        });
    });
