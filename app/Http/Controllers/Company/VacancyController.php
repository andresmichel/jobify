<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacancy;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = auth()->user()->company->vacancies()->paginate();

        return view('company.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('company.vacancies.create');
    }

    public function store(Request $request)
    {
        $vacancy = new Vacancy;

        $vacancy->company_id = auth()->user()->company->id;

        $vacancy->slug = str_slug($request->title);

        $this->factory($vacancy, $request);

        return redirect('company/vacancies');
    }

    public function show($slug)
    {
        $vacancy = auth()->user()->company->vacancies()->where('slug', $slug)->firstOrFail();

        return view('company.vacancies.show', compact('vacancy'));
    }

    public function edit($slug)
    {
        $vacancy = auth()->user()->company->vacancies()->where('slug', $slug)->firstOrFail();

        return view('company.vacancies.edit', compact('vacancy'));
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

        $vacancy = auth()->user()->company->vacancies()->findOrFail($id);

        return back();
    }

    public function destroy($id)
    {
        auth()->user()->company->vacancies->find($id)->delete();
        return redirect('company/vacancies');
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

    public function factory($vacancy, $request)
    {
        $vacancy->title = $request->title;
        $vacancy->description = $request->description;
        $vacancy->contract = $request->contract;
        $vacancy->area = $request->area;
        $vacancy->education = $request->education;
        $vacancy->shift = $request->shift;
        $vacancy->gender = $request->gender;
        $vacancy->experience = $request->experience;
        $vacancy->min_age = $request->min_age;
        $vacancy->max_age = $request->max_age;
        $vacancy->schedule = $request->schedule;
        $vacancy->hours = $request->hours;
        $vacancy->salary = $request->salary;
        $vacancy->language = $request->language;
        $vacancy->state = $request->state;
        $vacancy->city = $request->city;
        $vacancy->status = $request->status;
        $vacancy->save();
    }
}
