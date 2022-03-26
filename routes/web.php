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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fillbal', '\App\Http\Controllers\CrudController@getOffers');
//Route::get('/create', '\App\Http\Controllers\CrudController@store');
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
        Route::group(['prefix'=>'offers'],function (){
            Route::get('create','CrudController@create');
            Route::post('store','CrudController@store') ->name('offers.store') ;
            Route::get('all','CrudController@getAllOffers');
});
});
