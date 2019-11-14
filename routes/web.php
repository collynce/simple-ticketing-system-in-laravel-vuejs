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

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});
Route::get('home', function () {
    return view('home');
});
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('mail', 'PaymentsController@send');
Route::group(['middleware' => 'auth'],  function () {
    Route::get('client', 'HomeController@index');
    Route::resource('client', 'GetEventsController');
    Route::post('payment', 'PaymentsController@store')->name('payment');
});

Auth::routes();

Route::group(['middleware' => 'admin', 'prefix' => 'admin'],  function () {
    Route::resource('events', 'EventsController');
    Route::resource('tickets', 'TicketController');
    Route::get('dashboard', 'AdminController@index')->name('dashboard');
});
