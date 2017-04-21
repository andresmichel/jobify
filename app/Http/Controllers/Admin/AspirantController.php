<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Aspirant;
use DB;
use File;
use Exception;

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
            'birth' => 'required|date_format:Y-m-d',
            'state' => 'required|string',
            'city' => 'required|string',
            'avatar' => 'image|max:5000',
            'phone' => 'string',
        ]);

        $avatar = null;

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('uploads', 'public');
        }

        DB::beginTransaction();

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = 'aspirant';
        $user->avatar = $avatar;
        $user->save();

        $aspirant = new Aspirant;
        $aspirant->gender = $request->gender;
        $aspirant->birth = $request->birth;
        $aspirant->state = $request->state;
        $aspirant->city = $request->city;
        $aspirant->phone = $request->phone;

        $user->aspirant()->save($aspirant);

        DB::commit();
        
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
            'birth' => 'required|date_format:Y-m-d',
            'state' => 'required|string',
            'city' => 'required|string',
            'phone' => 'string',
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
        $user->save();

        $aspirant->update([
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

        if ($aspirant->resumeFile) {
            try {
                Storage::delete($aspirant->resumeFile->path);
            } catch (\Exception $e) {
                logger($e);
            }
        }

        if ($aspirant->user->avatar) {
            try { File::delete($aspirant->user->avatar); }
            catch (Exception $e) { logger($e); }
        }

        $aspirant->delete();

        return redirect('admin/aspirants');
    }
}
