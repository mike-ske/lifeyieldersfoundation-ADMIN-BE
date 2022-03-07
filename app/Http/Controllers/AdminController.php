<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *  
     * SET MIDDLEWARE FOR THIS ADMIN MAKE SURE THE USER 
     * IS AUTHENTICATED BEFORE HE ACCESS THIS ROUTE
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::orderBy('created_at')->paginate(2);
        return view('pages.profile', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //display frontend view
        return view('pages.admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDATE
        $user = $request->validate([
            'first_name' => 'required|string|max:40',
            'last_name' => 'required|string|max:40',
            'email' => 'required|string|email|max:225|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|string'
        ]);
        // STORE IN DB
       $create = User::create([
           'first_name' => $user['first_name'],
           'last_name' => $user['last_name'],
           'email' => $user['email'],
           'password' => Hash::make($user['password']),
           'role_id' => $user['role']
       ]);
       
       if ($create == true) {
            return back()->with('status', 'Admin account created');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        //display each admin profile
        return view('backend.adminProfile', compact('user'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        // dd($request->image->getClientOriginalName());
        // validate request 
        $request->validate([
            'first_name' => 'required|string|max:2000',
            'last_name' => 'required|string|max:40',
            'email' =>  'required|string|max:40|email',
            'password' =>  'required|string|max:40',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg',
            'role' => 'required|max:40'
        ]);
        // save data 
        $updated = User::where('id', $id)->update([
            'first_name' =>  $request->first_name,
            'last_name' =>  $request->last_name,
            'email' =>  $request->email,
            'password' => Hash::make($request->password),
            'image' =>  base64_encode(file_get_contents($request->image->getClientOriginalName())),
            'role' =>  $request->role
        ]);

        
        if ($updated) 
            return back()->with('status', 'Admin account updated');
        else  
            return back()->with('status', 'Failed to Update Admin account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
