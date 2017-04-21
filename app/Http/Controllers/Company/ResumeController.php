<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResumeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('job') && $request->has('aspirant')) {
            $job = auth()
                ->user()
                ->company
                ->jobs()
                ->findOrFail($request->job);

            $aspirant = $job
                ->aspirants()
                ->findOrFail($request->aspirant);

            if ($aspirant->resumeFile) {
                return response()->file(storage_path('app/')
                    . $aspirant->resumeFile->path);
            }

            if ($aspirant->resume) {
                return dd($aspirant->resume->getAttributes());
            }
        }

        abort(404);
    }
}
