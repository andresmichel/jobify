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

    public function education()
    {
       return $this->hasMany('App\Education');
    }

    public function experience()
    {
       return $this->hasMany('App\Experience');
    }

    public function languages()
    {
       return $this->hasMany('App\Language');
    }

    public function skills()
    {
       return $this->hasMany('App\Skill');
    }
}
