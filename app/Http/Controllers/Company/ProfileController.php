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
            'logo' => 'image',
            'description' => 'required|string',
            'website' => 'required|string',
            'category' => 'required|integer',
            'employees' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $user->update([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
        ]);

        auth()->user()->company->update([
            'user_id' => $user->id,
            'slug' => str_slug($request->name),
            'logo' => $request->logo,
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
