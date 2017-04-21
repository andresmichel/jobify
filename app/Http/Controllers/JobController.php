<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);

        if ($request->has('q')) {
            $words = explode(' ', $request->q);
            $jobs = Job::where('active', 1);

            foreach ($words as $word) {
                $jobs->where('title', 'like', "%$word%")
                    ->orWhere('description', 'like', "%$word%")
                    ->orWhere('area', 'like', "%$word%")
                    ->orWhere('shift', 'like', "%$word%")
                    ->orWhere('requirements', 'like', "%$word%")
                    ->orWhere('state', 'like', "%$word%")
                    ->orWhere('city', 'like', "%$word%")
                    ->orWhereHas('company', function ($query) use ($word) {
                        $query->whereHas('user', function ($query) use ($word) {
                            $query->where('name', 'like', "%$word%")
                                ->orWhere('email', 'like', "%$word%");
                        });
                });
            }

            $jobs = $jobs
                ->distinct()
                ->paginate(10)
                ->appends(['q' => $request->q]);
        }

        return view('public.jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = Job::where('active', 1)
            ->where('slug', $slug)
            ->firstOrFail();

        $related_jobs = Job::where('active', 1)
            ->where('slug', '!=', $slug)
            ->get()
            ->random(3);

        return view('public.jobs.show', compact('job', 'related_jobs'));
    }
}
