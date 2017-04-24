<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Resume;

class ResumeController extends Controller
{
    public function index()
    {
        return view('aspirant.resume');
    }

    public function store(Request $request)
    {
        $aspirant = auth()->user()->aspirant;

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'.$aspirant->user->id,
            'birth' => 'required|date_format:Y-m-d',
            'gender' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'description' => 'required|string',
            'goal' => 'required|string',
            'address' => 'required|string',
            'education' => 'required|json|not_in:[]',
            'experience' => 'required|json|not_in:[]',
            'skills' => 'required|json|not_in:[]',
            'languages' => 'required|json|not_in:[]',
        ]);

        $aspirant->name = $request->name;
        $aspirant->email = $request->email;
        $aspirant->birth = $request->birth;
        $aspirant->gender = $request->gender;
        $aspirant->state = $request->state;
        $aspirant->city = $request->city;
        $aspirant->phone = $request->phone;

        $resume = $aspirant->resume ?: new Resume;
        $resume->aspirant_id = auth()->user()->aspirant->id;
        $resume->description = $request->description;
        $resume->goal = $request->goal;
        $resume->address = $request->address;

        $resume->sections = json_encode([
            'education' => json_decode($request->education),
            'experience' => json_decode($request->experience),
            'skills' => json_decode($request->skills),
            'languages' => json_decode($request->languages),
        ]);

        $resume->picture = $request->picture ? 1 : 0;

        $resume->save();

        return back();
    }

    public function destroy()
    {
        $resume = auth()->user()->aspirant->resume;

        if ($resume) {
            $resume->delete();
        }

        return redirect('aspirant/resume');
    }
}
