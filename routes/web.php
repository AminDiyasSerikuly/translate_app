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

Auth::routes();
Route::redirect('/home', '/translation');
Route::get('/translation/get', 'TranslationController@getTranslation')->middleware('auth');
Route::resource('translation', 'TranslationController')->middleware('auth');

