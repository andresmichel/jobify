<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function show($slug)
    {
        $vacancy = auth()->user()->company->vacancies->where('slug', $slug)->first();

        return view('company.vacancies.show', compact('vacancy'));
    }

    public function edit($slug)
    {
        return view('company.vacancies.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
