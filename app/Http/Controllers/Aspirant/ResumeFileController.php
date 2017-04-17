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

        $resume = auth()->user()->aspirant->resumeFile;

        $file_name     = pathinfo($request->resume->getClientOriginalName(), PATHINFO_FILENAME);
        $file_ext      = pathinfo($request->resume->getClientOriginalName(), PATHINFO_EXTENSION);
        $file_fullname = date("Y_m_d_h_i_s_") . str_slug($file_name, '_') . '.' . $file_ext;

        $file = $request->resume;
        $file_path = $file->storeAs('resumes', $file_fullname);

        if ($resume) {
            try
            {
                Storage::delete($resume->path);
            } catch (\Exception $e) {
                logger($e);
            }

            $resume->name = $file_name;
            $resume->path = $file_path;
            $resume->size = $file->getClientSize();
            $resume->type = $file->getClientMimeType();
            $resume->ext = $file_ext;
            $resume->save();
        } else {
            auth()->user()->aspirant->resumeFile()->create([
                'aspirant_id' => auth()->user()->aspirant->id,
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

        return response()->file($path.$aspirant->resumeFile->path, [
            'Content-Disposition' => 'inline; filename*="nofunciona.pdf"'
        ]);
    }
}
