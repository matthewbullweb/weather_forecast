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
                        <h2>IPS</h2>
                        <pre>{{ var_dump($ips) }}</pre>
                        <p>&nbsp;</p>
                        <h2>RAW DATA</h2>
                        <pre>{{ $data }}</pre>
                        <p>&nbsp;</p>
                        <h2>Json decode</h2>

                </div>
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
                            @if($ip['status']=='Clouds')<i class="fa fa-5x fa-fw fa-cloud"></i>@endif
                            @if(in_array($ip['status'],['Rain','Drizzle']))<i class="fa fa-5x fa-fw fa-tint"></i>@endif
                            @if(in_array($ip['status'],['Clear','Sun']))<i class="fa fa-5x fa-fw fa-sun-o"></i>@endif
                            <br/>
                            <center>{{ $ip['status'] }}</center>
                        </div>
                        <div class="col-md-3">
                            {{ $ip['ip'] }}
                        </div>
                        <div class="col-md-3">
                            {{ $ip['location'] }}<br/>
                            {{ $ip['lat'] . ',' . $ip['lon']  }}
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
