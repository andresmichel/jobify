<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResumeFile extends Model
{
    protected $guarded = [];

    public function aspirant()
    {
       return $this->belongsTo('App\Aspirant');
    }
}
