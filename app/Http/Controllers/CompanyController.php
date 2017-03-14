<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    public function show($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();
        $jobs = $company->jobs()->paginate();

        return view('public.company.show', compact('company', 'jobs'));
    }
}
