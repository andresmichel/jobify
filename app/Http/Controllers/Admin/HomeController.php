<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Company;
use App\Aspirant;

class HomeController extends Controller
{
    public function index()
    {
        $jobs_length = Job::count();
        $companies_length = Company::count();
        $aspirants_length = Aspirant::count();

        return view('admin.index', compact('jobs_length', 'companies_length', 'aspirants_length'));
    }
}
