<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $guarded = [];

    public function aspirant()
    {
       return $this->belongsTo('App\Aspirant');
    }
}
