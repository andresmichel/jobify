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
        $job = new Job;

        $job->company_id = auth()->user()->company->id;

        $job->slug = str_slug($request->title);

        $this->factory($job, $request);

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
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'contract' => 'required|string',
            'area' => 'required|string',
            'education' => 'required|string',
            'shift' => 'required|string',
            'gender' => 'required|string',
            'experience' => 'required|string',
            'min_age' => 'required|string',
            'max_age' => 'required|string',
            'schedule' => 'required|string',
            'hours' => 'required|string',
            'salary' => 'required|string',
            'language' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'status' => 'required',
        ]);

        $job = auth()->user()->company->jobs()->findOrFail($id);

        return back();
    }

    public function destroy($id)
    {
        auth()->user()->company->jobs->find($id)->delete();
        return redirect('company/jobs');
    }

    public function validation($request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'contract' => 'required|string',
            'area' => 'required|string',
            'education' => 'required|string',
            'shift' => 'required|string',
            'gender' => 'required|string',
            'experience' => 'required|string',
            'min_age' => 'required|string',
            'max_age' => 'required|string',
            'schedule' => 'required|string',
            'hours' => 'required|string',
            'salary' => 'required|string',
            'language' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'status' => 'required',
        ]);
    }

    public function factory($job, $request)
    {
        $job->title = $request->title;
        $job->description = $request->description;
        $job->contract = $request->contract;
        $job->area = $request->area;
        $job->education = $request->education;
        $job->shift = $request->shift;
        $job->gender = $request->gender;
        $job->experience = $request->experience;
        $job->min_age = $request->min_age;
        $job->max_age = $request->max_age;
        $job->schedule = $request->schedule;
        $job->hours = $request->hours;
        $job->salary = $request->salary;
        $job->language = $request->language;
        $job->state = $request->state;
        $job->city = $request->city;
        $job->status = $request->status;
        $job->save();
    }
}
