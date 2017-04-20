<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;

class JobController extends Controller
{
    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $company = $job->company;
        $job->delete();
        return redirect('admin/companies/'.$company->id.'/edit');
    }
}
