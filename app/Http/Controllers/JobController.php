<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);
        //
        // if ($request->has('search')) {
        //     $jobs = Job::where('title', 'like', "%$request->search%")->orderBy('created_at', 'desc')->paginate(10);
        // }
        // else if ($request->by == 'salary') {
        //     $jobs = Job::orderBy('salary', 'desc')->paginate(10);
        // }

        return view('public.jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('active', 1)->where('slug', $slug)->firstOrFail();
        $related_jobs = Job::where('active', 1)->where('slug', '!=', $slug)->get()->random(3);

        return view('public.jobs.show', compact('job', 'related_jobs'));
    }
}
