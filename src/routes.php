<?php

Route::middleware(['web'])->group(function () {
	Route::get('forecast', 'Ecce\WeatherForecast\ForecastController@get');
});