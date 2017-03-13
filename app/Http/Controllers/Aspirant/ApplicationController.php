<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacancy;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->aspirant->vacancies()->paginate();

        return view('aspirant.applications', compact('applications'));
    }

    public function update($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        if ($vacancy->applied()) {
            auth()->user()->aspirant->vacancies()->detach($id);
        } else {
            auth()->user()->aspirant->vacancies()->attach($id);
        }

        return back();
    }
}
