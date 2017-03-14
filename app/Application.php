<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function aspirant()
    {
        return $this->belongsTo('App\Aspirant');
    }
}
