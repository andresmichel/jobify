<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Aspirant;
use App\User;

class RegisterAspirantController extends Controller
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
            'gender' => 'required|string',
            'birth' => 'required|date_format:Y-m-d',
            'state' => 'required|string',
            'city' => 'required|string',
            'phone' => 'string',
            'avatar' => 'image|max:5000',
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

        Auth::login($user);

        return redirect('/');
    }
}
