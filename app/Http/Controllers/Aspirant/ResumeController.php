<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resume;

class ResumeController extends Controller
{
    public function index()
    {
        return view('aspirant.resume');
    }

    public function store(Request $request)
    {
        $resume = auth()->user()->resume;

        if ($resume) {
            $resume->update([
                'resume' => $request->resume
            ]);
        } else {
            Resume::create([
                'aspirant_id' => auth()-user()->aspirant->id,
                'resume' => $request->resume
            ]);
        }
    }
}
