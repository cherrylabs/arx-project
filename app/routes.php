<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

if(!Config::has('arxmin')){
    Route::controller('/install', 'Arxmin\\InstallController');
}

Route::controller('/assets', 'AssetsController');
Route::controller('/packages', 'AssetsController');
