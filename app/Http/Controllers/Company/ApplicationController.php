<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Application;
use DB;

class ApplicationController extends Controller
{
    public function index()
    {
        $vacancies = auth()->user()->company->vacancies;

        $vacancy_ids = [];
        $ss = [];

        foreach ($vacancies as $vacancy) {
            $vacancy_ids[] = $vacancy->id;
        }

        $applications = [];

        if ($vacancy_ids) {
            $applications = Application::where('vacancy_id', $vacancy_ids)->get()->groupBy('vacancy_id');
        }
        return view('company.applications.index', compact('applications'));
    }

    public function show($id)
    {
        return view('company.applications.show')->with('application', Application::findOrFail($id));
    }
}
