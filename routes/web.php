<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ActionController;

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


Route::get('/dashboard', 'HomeController@index')->middleware('auth')->name('dashboard');
Route::get('/clicktocall/2000/{numeroB}', 'ClicktocallController@ctc');
Route::get('/add', 'ActionController@add')->name('add');
Route::post('/add/ramal', 'ActionController@addReturn')->name('add/ramal');
require __DIR__.'/auth.php';
