<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
            $users = User::where('role', 'company')
                ->whereNotNull('avatar')
                ->limit(10)
                ->inRandomOrder()
                ->get();

            return view('index', compact('users'));
        }
    }
}
