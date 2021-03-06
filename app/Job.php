<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    protected $guarded = [];

    public function company()
    {
       return $this->belongsTo('App\Company');
    }

    public function aspirants()
    {
        return $this->belongsToMany('App\Aspirant', 'applications');
    }

    public function applications()
    {
        return $this->hasMany('App\Application');
    }

    public function applied()
    {
        if (auth()->user()->aspirant) {
            foreach (auth()->user()->aspirant->jobs as $v) {
                if ($v->id == $this->id) {
                    return true;
                }
            }
        }

        return false;
    }
}
