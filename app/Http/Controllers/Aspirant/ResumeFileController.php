<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\ResumeFile;

class ResumeFileController extends Controller
{
    public function index()
    {
        return view('aspirant.resume-file');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'resume'   => 'required|file|max:5000|mimes:doc,docx,pdf',
        ]);

        $current_file = auth()->user()->aspirant->resumeFile;

        $file = $request->file('resume');
        $file_path = $file->store('resumes');

        if ($current_file) {
            try {
                Storage::delete($current_file->path);
            } catch (\Exception $e) {
                logger($e);
            }
        } else {
            $current_file = new ResumeFile;
            $current_file->aspirant_id = auth()->user()->aspirant->id;
        }

        $current_file->path = $file_path;
        $current_file->size = $file->getClientSize();
        $current_file->type = $file->getClientMimeType();
        $current_file->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $current_file->ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $current_file->save();

        return back();
    }

    public function download()
    {
        $aspirant = auth()->user()->aspirant;

        if (! $aspirant->resumeFile) {
            abort(404);
        }

        return response()->file(storage_path('app/').$aspirant->resumeFile->path);
    }

    public function destroy()
    {
        $file = auth()->user()->aspirant->resumeFile;

        if ($file) {
            try {
                Storage::delete($file->path);
            } catch (\Exception $e) {
                logger($e);
            }

            $file->delete();
        }

        return redirect('aspirant/resume/file');
    }
}
