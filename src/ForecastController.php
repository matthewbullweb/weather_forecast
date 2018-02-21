<?php

namespace Ecce\WeatherForecast;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForecastController extends Controller
{

	public function get(){
		//echo 'Hello from the forecast package!';
		return view('forecast::forecast');
	}

}
