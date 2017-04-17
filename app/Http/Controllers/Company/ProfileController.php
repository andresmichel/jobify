<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('company.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'required|string|confirmed',
            'avatar' => 'image|max:5000',
            'description' => 'required|string',
            'website' => 'required|string',
            'category' => 'required|string',
            'employees' => 'required|integer',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        if ($request->avatar) {
            //
        }

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'avatar' => $request->avatar,
        ]);

        auth()->user()->company->update([
            'user_id' => $user->id,
            'slug' => str_slug($request->name),
            'description' => $request->description,
            'website' => $request->website,
            'category' => $request->category,
            'employees' => $request->employees,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        return back();
    }
}
