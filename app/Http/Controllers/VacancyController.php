<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;

class VacancyController extends Controller
{
    public function index(Request $request)
    {
        $vacancies = Vacancy::paginate();

        if ($request->has('search')) {
            $vacancies = Vacancy::where('title', 'like', "%$request->search%")->paginate();
        }
        else if ($request->by == 'date') {
            $vacancies = Vacancy::orderBy('created_at')->paginate();
        }
        else if ($request->by == 'salary') {
            $vacancies = Vacancy::orderBy('salary', 'desc')->paginate();
        }

        return view('public.vacancies.index', compact('vacancies'));
    }

    public function show($slug)
    {
        $vacancy = Vacancy::where('slug', $slug)->first();
        $related_vacancies = Vacancy::where('slug', '!=', $slug)->get()->random(3);

        return view('public.vacancies.show', compact('vacancy', 'related_vacancies'));
    }
}
