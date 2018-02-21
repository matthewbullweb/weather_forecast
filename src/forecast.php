<?php

namespace Ecce\WeatherForecast;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'forecast';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'ip', 'status'
    ];

}
