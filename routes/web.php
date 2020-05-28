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

Route::get('/', 'HomeController@index');

Route::get('database-test', function(){
    if(DB::connection()->getDatabaseName()){
        echo "Database connection is UP: " . DB::connection()->getDatabaseName();
    }
});

Route::post('stocks', 'StocksController@InsertStock');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/get-data', function(){
    return view('get-api-data');
});

Route::post('bets', 'BetsController@store');

Route::get('/leaderboards', "FrontendController@showLeaderboards");

Route::get('/profile', "FrontendController@profile");