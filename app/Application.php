<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function vacancy()
    {
        return $this->belongsTo('App\Vacancy');
    }

    public function aspirant()
    {
        return $this->belongsTo('App\Aspirant');
    }
}
