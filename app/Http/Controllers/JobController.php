<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('active', 1)->orderBy('created_at', 'desc')->paginate(10);

        if ($request->has('q')) {
            $words = explode(' ', $request->q);
            $jobs = Job::where('active', 1);
            $companies = User::query();

            foreach ($words as $word) {
                $jobs->where('description', 'like', "%$word%")
                    ->orWhere('area', 'like', "%$word%")
                    ->orWhere('shift', 'like', "%$word%")
                    ->orWhere('requirements', 'like', "%$word%")
                    ->orWhere('state', 'like', "%$word%")
                    ->orWhere('city', 'like', "%$word%");

                $companies->orWhere('name', 'like', "%$word%")
                    ->where('role', 'company');
            }

            $companies = $companies->distinct()->get();
            $company_jobs = collect([]);

            foreach ($companies as $company) {
                if (count($company->company->jobs)) {
                    foreach ($company->company->jobs as $job) {
                        $company_jobs->push($job);
                    }
                }
            }

            $jobs = $company_jobs->merge($jobs->distinct()->get());
            $items = 10;
            $start = 0;

            $jobs = new Paginator($jobs->splice($start, $items), count($jobs), $items, $request->page ?: 1, [
                'path' => url('jobs')
            ]);

            $jobs = $jobs->appends(['q' => $request->q]);

            // $jobs = $jobs
            //     ->distinct()
            //     ->paginate(10)
            //     ->appends(['q' => $request->q]);
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
