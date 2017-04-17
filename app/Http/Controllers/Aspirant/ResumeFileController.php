<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResumeFileController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'resume'   => 'required|file|max:5000|mimes:doc,docx,pdf',
        ]);

        $resume_file = auth()->user()->aspirant->resumeFile;

        $file = $request->resume;
        $file_name     = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $file_ext      = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $file_fullname = date("Y_m_d_h_i_s_") . str_slug($file_name, '_') . '.' . $file_ext;

        $file_path = $file->storeAs('resumes', $file_fullname);

        if ($resume_file) {
            try {
                Storage::delete($resume_file->path);
            } catch (\Exception $e) {
                logger($e);
            }

            $resume_file->name = $file_name;
            $resume_file->path = $file_path;
            $resume_file->size = $file->getClientSize();
            $resume_file->type = $file->getClientMimeType();
            $resume_file->ext = $file_ext;
            $resume_file->save();
        } else {
            auth()->user()->aspirant->resumeFile()->create([
                'name' => $file_name,
                'path' => $file_path,
                'size' => $file->getClientSize(),
                'type' => $file->getClientMimeType(),
                'ext' => $file_ext,
            ]);
        }

        return back();
    }

    public function download()
    {
        $aspirant = auth()->user()->aspirant;
        $path = Storage::getDriver()->getAdapter()->getPathPrefix();

        if (!$aspirant->resumeFile) {
            abort(404);
        }

        return response()->file($path.$aspirant->resumeFile->path);
    }

    public function destroy()
    {
        $resume_file = auth()->user()->aspirant->resumeFile;

        if ($resume_file) {
            try {
                Storage::delete($resume_file->path);
            } catch (\Exception $e) {
                logger($e);
            }

            $resume_file->delete();
        }

        return redirect('/');
    }
}
