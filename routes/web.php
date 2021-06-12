<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReasonController;
use App\Http\Controllers\AttributeController;

Route::resource('reasons',ReasonController::class);
Route::resource('attribute',AttributeController::class);
Route::post('/reasons_find','App\Http\Controllers\ReasonController@find')->name('reasons_find');

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
    return view('home');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
