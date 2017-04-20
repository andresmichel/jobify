<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;
use DB;
use File;
use Exception;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.companies.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'avatar' => 'image|max:5000',
            'description' => 'required|string',
            'website' => 'required|string',
            'category' => 'required|integer',
            'employees' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $avatar = null;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('uploads', 'public');
        }

        DB::transaction(function () {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'company',
                'avatar' => $avatar,
            ]);

            $company = Company::create([
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
        });

        return redirect('admin/companies');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $user = $company->user;

        $this->validate($request, [
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,$user->id",
            'password' => 'required|string|confirmed',
            'avatar' => 'image|max:5000',
            'description' => 'required|string',
            'website' => 'required|string',
            'category' => 'required|integer',
            'employees' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('uploads', 'public');

            if ($user->avatar) {
                try { File::delete($user->avatar); }
                catch (Exception $e) { logger($e); }
            }

            $user->avatar = $avatar;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $company->update([
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->user->delete();

        if ($company->job) {
            $company->job->delete();
        }

        if ($company->user->avatar) {
            try { File::delete($company->user->avatar); }
            catch (Exception $e) { logger($e); }
        }

        $company->delete();

        return redirect('admin/companies');
    }
}
