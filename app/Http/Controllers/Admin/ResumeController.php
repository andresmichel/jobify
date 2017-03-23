<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Resume;

class ResumeController extends Controller
{
    public function destroy($id)
    {
        Resume::findOrFail($id);
        return back();
    }
}
