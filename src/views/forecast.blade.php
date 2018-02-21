@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Data Viewer</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        <!-- <p id="result">? °</p>

                        <!-- Simple button -->
                        <!-- <button id="showTemp">Submit</button>  -->

                        <h2>IPS</h2>
                        <pre>{{ var_dump($ips) }}</pre>
                        <p>&nbsp;</p>
                        <h2>RAW DATA</h2>
                        <pre>{{ $data }}</pre>
                        <p>&nbsp;</p>
                        <h2>Json decode</h2>
                        <pre>{{ var_dump($json) }}</pre>
                </div>


               <!-- <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>

                <script type="text/javascript">

                $(document).ready(function () {
                  var lat, lon, api_url;
                  
                  //if ("geolocation" in navigator) {
                    
                    $('#showTemp').on('click', function () {
                       //navigator.geolocation.getCurrentPosition(gotLocation);

                       console.log('clicked');

                      function gotLocation(position) {
                        lat = 51.3132945; //position.coords.latitude;
                        lon = 0.1874059; //position.coords.longitude;

                        api_url = 'http://api.openweathermap.org/data/2.5/weather?lat=' +
                                  lat + '&lon=' + 
                                  lon + '&units=metric&appid=9da85150f08a5e245ee5bf7af80959e0'; //b231606340553d9174136f7f083904b3
                       // http://api.openweathermap.org/data/2.5/weather?q=London,uk&callback=test&appid=b1b15e88fa79722
                        
                        $.ajax({
                          url : api_url,
                          method : 'GET',
                          success : function (data) {
                            


                            var tempr = data.main.temp;
                            var location = data.name;
                            var desc = data.weather.description;
                            

                            $('#result').text(tempr + '°' + location);

                          }
                        });
                     }
                    });
                    
                  /*} else {
                    alert('Your browser doesnt support geolocation. Sorry.');
                  }*/
                  
                });
                </script>

-->
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">App UI</div>

                <div class="panel-body">
                    
                    @if( count($ips) > 0 )
                    <div class="row">
                        <div class="col-md-2">
                            <b>Status Icon</b>
                        </div>
                        <div class="col-md-3">
                           <b>IP Address</b>
                        </div>
                        <div class="col-md-3">
                            <b>Location</b>
                        </div>
                        <div class="col-md-3">
                            <b>Datetime</b>
                        </div>
                    </div>
                    @foreach($ips AS $ip)
                    <div class="row">
                        <div class="col-md-2">
                            <i class="fa fa-5x fa-cloud"></i>
                        </div>
                        <div class="col-md-3">
                            {{ $ip['ip'] }}
                        </div>
                        <div class="col-md-3">
                            {{ $ip['location'] }}
                        </div>
                        <div class="col-md-3">
                            {{ $ip['datetime'] }}
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
