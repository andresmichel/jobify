<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function show($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();
        $vacancies = $company->vacancies()->paginate();

        return view('public.company.show', compact('company', 'vacancies'));
    }
}
