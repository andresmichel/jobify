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
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'picture' => 'image:max:5000',
            'birth' => 'required|date_format:Y-m-d',
            'gender' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'phone' => 'required|string',
            'description' => 'required|string',
            'goal' => 'required|string',
            'address' => 'required|string',
            'sections' => 'required|json',
        ]);

        $aspirant = auth()->user()->aspirant;
        $aspirant->name = $request->name;
        $aspirant->email = $request->email;
        $aspirant->birth = $request->birth;
        $aspirant->gender = $request->gender;
        $aspirant->state = $request->state;
        $aspirant->city = $request->city;
        $aspirant->phone = $request->phone;

        $resume = $aspirant->resume;
        $resume = $resume ?: new Resume;
        $resume->aspirant_id = auth()->user()->aspirant->id;
        $resume->description = $request->description;
        $resume->goal = $request->goal;
        $resume->address = $request->address;
        $resume->sections = $request->sections;
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
