<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $guarded = [];

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function vacancies()
    {
       return $this->hasMany('App\Vacancy');
    }
}
