<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $guarded = [];

    public function resume()
    {
       return $this->belongsTo('App\Resume');
    }
}
