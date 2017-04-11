<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            switch(auth()->user()->role) {
                case 'admin':
                    return redirect(auth()->user()->role);
                case 'aspirant':
                    return redirect('aspirant/resume');
                    break;
                case 'company':
                    return redirect('company/jobs');
                    break;
                default:
                    abort(404);
                    break;
            }
        } else {
            $companies = Company::all();
            $companies = $companies->random(count($companies));
            
            return view('index', compact('companies'));
        }
    }
}
