<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class JobController extends Controller
{
    public function index()
    {
        $jobs = auth()->user()->company->jobs()->orderBy('created_at', 'desc')->paginate(10);
        return view('company.jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('company.jobs.create');
    }

    public function store(Request $request)
    {
        $this->validation($request);

        $job = new Job;
        $job->company_id = auth()->user()->company->id;
        $job->slug = str_slug($request->title);
        $this->factory($job, $request);
        $job->save();

        return redirect('company/jobs');
    }

    public function show($slug)
    {
        $job = auth()->user()->company->jobs()->where('slug', $slug)->firstOrFail();
        return view('company.jobs.show', compact('job'));
    }

    public function edit($slug)
    {
        $job = auth()->user()->company->jobs()->where('slug', $slug)->firstOrFail();
        return view('company.jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $this->validation($request);
        $job = auth()->user()->company->jobs()->findOrFail($id);
        $job->slug = str_slug($request->title);
        $this->factory($job, $request);
        $job->save();

        return back();
    }

    public function destroy($id)
    {
        auth()->user()->company->jobs->findOrFail($id)->delete();
        return redirect('company/jobs');
    }

    public function validation($request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'area' => 'required|string',
            'requirements' => 'required|json',
            'shift' => 'required|string',
            'salary' => 'required|numeric',
            'state' => 'required|string',
            'city' => 'required|string',
        ]);
    }

    public function factory($job, $request)
    {
        $job->title = $request->title;
        $job->description = $request->description;
        $job->fulltime = $request->fulltime ? 1 : 0;
        $job->area = $request->area;
        $job->requirements = $request->requirements;
        $job->shift = $request->shift;
        $job->salary = $request->salary;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->remote = $request->remote ? 1 : 0;
        $job->active = $request->active ? 1 : 0;
    }
}
