<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('aspirant.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'required|string|confirmed',
            'gender' => 'required|string',
            'birth' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'phone' => 'string',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        auth()->user()->aspirant->update([
            'gender' => $request->gender,
            'birth' => $request->birth,
            'state' => $request->state,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);

        return back();
    }
}
