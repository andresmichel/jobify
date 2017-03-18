<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->aspirant->jobs()->paginate(10);

        return view('aspirant.applications', compact('applications'));
    }

    public function update($id)
    {
        $job = Job::findOrFail($id);

        if ($job->applied()) {
            auth()->user()->aspirant->jobs()->detach($id);
        } else {
            auth()->user()->aspirant->jobs()->attach($id);
        }

        return back();
    }
}
