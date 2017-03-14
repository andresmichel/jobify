<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate();

        return view('aspirant.index', compact('jobs'));
    }
}
