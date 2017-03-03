<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacancy;

class HomeController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::paginate();

        return view('aspirant.index', compact('vacancies'));
    }
}
