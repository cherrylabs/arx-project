<?php

Route::group(['prefix' => 'arxmin/modules/dashboard', 'namespace' => 'Modules\Dashboard\Http\Controllers'], function()
{
	Route::controller('/', 'DashboardController');
});