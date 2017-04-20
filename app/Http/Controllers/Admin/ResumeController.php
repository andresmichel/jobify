<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Resume;
use App\ResumeFile;

class ResumeController extends Controller
{
    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
        $aspirant = $resume->aspirant;
        $resume->delete();
        return redirect('admin/aspirants/'.$aspirant->id.'/edit');
    }

    public function destroyFile($id)
    {
        $resume_file = Resume::findOrFail($id);
        $aspirant = $resume_file->aspirant;

        try {
            Storage::delete($resume_file->path);
        } catch (\Exception $e) {
            logger($e);
        }

        return redirect('admin/aspirants/'.$company->id.'/edit');
    }
}
