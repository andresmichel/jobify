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
                case 'aspirant':
                case 'company':
                    return redirect(auth()->user()->role);
                    break;
                default:
                    abort(404);
            }
        } else {
            return view('index');
        }
    }
}
