<?php

namespace Ecce\WeatherForecast;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ForecastController extends Controller
{
	public function sample_data(){

		//could come from a database

		$data = [
			['ip'=>'123.211.61.50',
			'datetime'=> null],
			['ip'=>'122.62.248.72',
			'datetime'=> null],
			['ip'=>'23.19.62.102',
			'datetime'=> null],
			['ip'=>'105.225.185.20',
			'datetime'=> null],
			['ip'=>'80.62.117.27',
			'datetime'=> null],
			['ip'=>'68.96.102.16',
			'datetime'=> null],
		];

		//workout locations
		//workout time in location

		foreach($data as $k=>$v){
			$data[$k]['location'] = 'Unknown';
			$data[$k]['datetime'] = now();
		}

		return $data;
	}


	public function get(){
		//echo 'Hello from the forecast package!';

		$key = "9da85150f08a5e245ee5bf7af80959e0";
		$query = "London,uk";

		//get location ip

		$ips = $this->sample_data();

		//use api to get these:
		//workout locations
		//workout time in location


		//get data from api


 		$client = new \GuzzleHttp\Client();
 		$res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?q='.$query.'&appid='.$key); //callback=test

 		if( $res->getStatusCode() == 200 ) {

 			$data = $res->getBody();
 			$json = json_decode( (string) $data , true);  
 			

 			//$json2 = preg_replace("/(\/?test[^)]*\>/i", "", $json); 

 			/*echo '<pre>';
 			print_r( $json2 );
 			echo '</pre>';
 			die();*/

 			return view('forecast::forecast', ['ips' => $ips, 'data' => $data, 'json' => $json]);

 			//return $res->getBody();

 		} //$res->getHeaderLine('content-type');
 		

	}

}
