<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\Auth\LoginController;

Route::resource('reasons',ReasonController::class);
Route::resource('attribute',AttributeController::class);
Route::resource('auth',LoginController::class);

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

/*Route::group([
    'as'=>'auth.',
    'prefix'=>'auth',
],function(){
    Route::get('login','app\Http\Controllers\Auth\LoginController@login')->name('login');
    Route::get('login','Auth\LoginController@authenticate')->name('auth');
    Route::get('logout','Auth\LoginController@logout')->name('logout');
});*/

Route::get('/', function () {
    return view('welcome');
});
