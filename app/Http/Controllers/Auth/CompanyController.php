<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Company;
use App\User;
use DB;

class CompanyController extends Controller
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
        return view('auth.company');
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
            'description' => 'required|string',
            'avatar' => 'image|max:5000',
            'website' => 'required|string',
            'category' => 'required|string',
            'employees' => 'required|integer',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
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
        $user->role = 'company';
        $user->avatar = $avatar;
        $user->save();

        $company = new Company;
        $company->user_id = $user->id;
        $company->slug = str_slug($request->name);
        $company->description = $request->description;
        $company->website = $request->website;
        $company->category = $request->category;
        $company->employees = $request->employees;
        $company->state = $request->state;
        $company->city = $request->city;
        $company->address = $request->address;
        $company->phone = $request->phone;

        $user->company()->save($company);

        DB::commit();

        auth()->login($user);

        return redirect('/');
    }
}
