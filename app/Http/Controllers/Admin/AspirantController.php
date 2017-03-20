<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Aspirant;

class AspirantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Aspirant::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.aspirants.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aspirants.create');
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
            'gender' => 'required|string',
            'birth' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'phone' => 'string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'aspirant',
        ]);

        $aspirant = Aspirant::create([
            'user_id' => $user->id,
            'gender' => $request->gender,
            'birth' => $request->birth,
            'state' => $request->state,
            'city' => $request->city,
            'phone' => $request->phone,
        ]);

        return redirect('admin/aspirants');
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
        $aspirant = Aspirant::findOrFail($id);
        return view('admin.aspirants.edit', compact('aspirant'));
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
        $aspirant = Aspirant::findOrFail($id);
        $user = $aspirant->user;

        $this->validate($request, [
            'name' => 'required|string',
            'email' => "required|email|unique:users,email,$user->id",
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

        $user->aspirant->update([
            'gender' => $request->gender,
            'birth' => $request->birth,
            'state' => $request->state,
            'city' => $request->city,
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
        $aspirant = Aspirant::findOrFail($id);
        $aspirant->user->delete();

        if ($aspirant->resume) {
            $aspirant->resume->delete();
        }

        $aspirant->delete();

        return redirect('admin/aspirants');
    }
}
