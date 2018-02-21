<?php
/* Need the web middleware otherwise user login session will not be pulled. */
Route::middleware(['web'])->group(function () {
	Route::get('forecast', 'Ecce\WeatherForecast\ForecastController@get');

	Route::get('iptest', function(){

/*		$Ip = new \App\Ip;

        $Ip->ip = '23.211.61.50';
        $Ip->city = 'ddd';
        $Ip->country = 'ddd';
        $Ip->lat = '22';
        $Ip->lon = '33';

        $Ip->save();
*/

		$ip = App\Ip::all();

		dd($ip);

	});
});


