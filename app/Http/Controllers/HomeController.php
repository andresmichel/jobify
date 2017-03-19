<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            return view('index');
        }
    }
}
