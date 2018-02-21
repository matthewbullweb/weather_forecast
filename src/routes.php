<?php
/* Need the web middleware otherwise user login session will not be pulled. */
Route::middleware(['web'])->group(function () {
	Route::get('forecast', 'Ecce\WeatherForecast\ForecastController@get');
});