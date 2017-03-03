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

    public function vacancies()
    {
        return $this->belongsToMany('App\Vacancy', 'applications');
    }
}
