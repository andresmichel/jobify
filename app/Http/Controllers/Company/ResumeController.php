<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResumeController extends Controller
{
    public function index($job_id, $aspirant_id)
    {
        $job = auth()->user()->company->jobs()->findOrFail($job_id);
        $aspirant = $job->aspirants()->findOrFail($aspirant_id);
        $path = Storage::getDriver()->getAdapter()->getPathPrefix();

        if (!$aspirant->resume) {
            abort(404);
        }

        // return response()->download($path.$aspirant->resume->path, 'cv-'.str_slug($aspirant->user->name).'.'.$aspirant->resume->ext);
        return response()->file($path.$aspirant->resume->path, [
            'Content-Disposition' => 'inline; filename*="nofunciona.pdf"'
        ]);
    }
}
