<?php

namespace Ecce\WeatherForecast;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

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

		//workout locations using ipinfo.io api
		//workout time in location

		foreach($data as $k=>$v){

			//could check if already stored in db to save time

	 		$client = new \GuzzleHttp\Client();
	 		try {
	 			$res = $client->request('GET', 'ipinfo.io/'.$v['ip']);
	 		} catch (RequestException $e) {
			    echo Psr7\str($e->getRequest());
			    if ($e->hasResponse()) {
			        echo Psr7\str($e->getResponse());
			   }
			}

	 		if( $res->getStatusCode() == 200 ) {


	 			$json = json_decode( (string) $res->getBody(), true);

	 			if( isset($json['city']) && $json['city']!="" ) {

	 				if( isset($json['country']) && $json['country']!=""  ) {

	 					$data[$k]['location'] = $json['city'] . ', ' . $json['country'];

	 				} else {

	 					$data[$k]['location'] = $json['city'];
	 				}

	 			} else {
	 				if( isset($json['country']) && $json['country']!=""  ) {

	 					$data[$k]['location'] = $json['country'];

	 				} else {

	 					$data[$k]['location'] = 'Unknown';
	 				}
	 			}

	 			//$data[$k]['location'] = $json;


	 		} else {
				$data[$k]['location'] = 'Unknown';
	 		}

			$data[$k]['datetime'] = now();


			$loc = explode(",", $json['loc'] );


			$data[$k]['lat'] = $loc[0];
			$data[$k]['lon'] = $loc[1];

		}


		//dd($data);

		return $data;
	}


	public function get(){
		//echo 'Hello from the forecast package!';
		$data = [];
		$key = "9da85150f08a5e245ee5bf7af80959e0";
		$query = "London,uk"; //default starting point

		//get location ip

		$ips =  $this->sample_data();

		//get data from openweathermap api
		foreach($ips AS $k=>$v){

			//$query = $v['location'];

	 		$client = new \GuzzleHttp\Client();
	 		try {
	 			//$res = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?q='.$query.'&appid='.$key); //callback=test
	 			//lan long maybe better
	 			$res = $client->request('GET', 'api.openweathermap.org/data/2.5/weather?lat='.$v['lat'].'&lon='.$v['lon'].'&appid='.$key);
	 		} catch (RequestException $e) {
			    echo '<pre>';
			    echo Psr7\str($e->getRequest());
			    if ($e->hasResponse()) {
			        echo Psr7\str($e->getResponse());
			    }
			    print_r($query);
			    echo '<pre>';
			    die();
			}

	 		if( $res->getStatusCode() == 200 ) { //$res->getHeaderLine('content-type');
	 			//Success
	 			$data = $res->getBody();
	 			$json = json_decode( (string) $data , true);  

	 			$ips[$k]['status'] = $json['weather'][0]['main'];
	 		} else {
	 			//Error!
	 		}
 		}

 		return view('forecast::forecast', ['ips' => $ips, 'data' => $data, 'json' => $json]);
	}

}
