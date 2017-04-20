<?php

namespace App\Http\Controllers\Aspirant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;
use Exception;

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
            'birth' => 'required|date_format:Y-m-d',
            'state' => 'required|string',
            'city' => 'required|string',
            'avatar' => 'image|max:5000',
            'phone' => 'string',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('uploads', 'public');

            if ($user->avatar) {
                try {
                    File::delete($user->avatar);
                } catch (Exception $e) {
                    logger($e);
                }
            }

            $user->avatar = $avatar;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

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
