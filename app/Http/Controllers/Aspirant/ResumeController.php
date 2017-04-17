<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        return view('aspirant.resume');
    }

    public function store(Request $request)
    {        
        $this->validate($request, [
            'description' => 'required|string',
            'goal' => 'required|string',
            'address' => 'required|string',
            'sections' => 'required|json',
        ]);

        $resume = auth()->user()->aspirant->resume;

        $resume = $resume ?: new Resume;

        $resume->description = $request->description;
        $resume->goal = $request->goal;
        $resume->address = $request->address;
        $resume->sections = $request->sections;
        $resume->picture = $request->picture ? 1 : 0;

        return back();
    }

    public function destroy()
    {
        $resume = auth()->user()->aspirant->resume;

        if ($resume) {
            $resume->delete();
        }

        return redirect('/');
    }
}
