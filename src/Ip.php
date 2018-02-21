<?php

namespace Ecce\WeatherForecast;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ip';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'ip', 'city', 'country', 'lat', 'lon'
    ];

}
