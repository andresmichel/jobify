<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aspirant extends Model
{
    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function jobs()
    {
        return $this->belongsToMany('App\Job', 'applications');
    }

    public function applications()
    {
        return $this->hasMany('App\Application');
    }

    public function resume()
    {
        return $this->hasOne('App\Resume');
    }
}
