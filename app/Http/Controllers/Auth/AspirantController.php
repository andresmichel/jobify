<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Aspirant;
use App\User;
use DB;

class AspirantController extends Controller
{
    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.aspirant');
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
            'gender' => 'required|string',
            'birth' => 'required|date_format:Y-m-d',
            'state' => 'required|string',
            'city' => 'required|string',
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

        auth()->login($user);

        return redirect('/');
    }
}
