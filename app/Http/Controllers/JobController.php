<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);

        if ($request->has('q')) {
            $jobs = Job::where('title', 'like', "%$request->q%")->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('public.jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('active', 1)->where('slug', $slug)->firstOrFail();
        $related_jobs = Job::where('active', 1)->where('slug', '!=', $slug)->get()->random(3);

        return view('public.jobs.show', compact('job', 'related_jobs'));
    }
}
