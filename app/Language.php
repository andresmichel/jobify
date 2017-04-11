<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];

    public function resume()
    {
       return $this->belongsTo('App\Resume');
    }
}
