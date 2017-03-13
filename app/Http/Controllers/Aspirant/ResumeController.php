<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resume;
use File;

class ResumeController extends Controller
{
    public function index()
    {
        return view('aspirant.resume');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'resume'   => 'required|file|max:5000|mimes:doc,docx,pdf',
        ]);

        $resume = auth()->user()->aspirant->resume;

        $file_name     = pathinfo($request->resume->getClientOriginalName(), PATHINFO_FILENAME);
        $file_ext      = pathinfo($request->resume->getClientOriginalName(), PATHINFO_EXTENSION);
        $file_fullname = date("Y_m_d_h_i_s_") . str_slug($file_name, '_') . '.' . $file_ext;

        $file = $request->resume;
        $file->move('uploads/resumes', $file_fullname);

        if ($resume) {
            try
            {
                File::delete($resume->path);
            } catch (\Exception $e) {
                logger($e);
            }

            $resume->name = $file_name;
            $resume->path = 'uploads/resumes/' . $file_fullname;
            $resume->size = $file->getClientSize();
            $resume->type = $file->getClientMimeType();
            $resume->ext = $file_ext;
            $resume->save();
        } else {
            auth()->user()->aspirant->resume()->create([
                'aspirant_id' => auth()->user()->aspirant->id,
                'name' => $file_name,
                'path' => 'uploads/resumes/' . $file_fullname,
                'size' => $file->getClientSize(),
                'type' => $file->getClientMimeType(),
                'ext' => $file_ext,
            ]);
        }

        return back();
    }
}
