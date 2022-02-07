<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('guests.welcome');
});

Auth::routes();

//Admin route
Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(
    function () {
        /* Admin HomePage route */
        Route::get('/', 'HomeController@index')->name('home');

        //Product route
        Route::resource('/products', 'ProductsController');
    });

//Home front-office route
Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*');