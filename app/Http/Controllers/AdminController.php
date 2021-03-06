<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        $admin = User::where('role_id', '>=', '2')->orderBy('id', 'DESC')->paginate(50);
        return view('pages.profile', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Authorization access
        Gate::authorize('edit-settings');
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
        // dd($id);
        $authuser = Auth::user()->id;
        if ("$authuser" !== $id) {
            // Authorization access
            Gate::authorize('edit-settings');
        }
        
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
        if($request->image !== null){
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,gif,jpeg',
            ]);
            ##### update image
            $imgPath = $request->image->path();
            $updated = User::where('id', $id)->update([
                'image' =>  base64_encode(file_get_contents($imgPath))
            ]);
        }
        else 
        {
            // validate request 
            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' =>  'required|string|email',
                'password' =>  'required|string',
                'role' => 'required'
            ]);

            // save data
            $updated = User::where('id', $id)->update([
                'first_name' =>  $request->first_name,
                'last_name' =>  $request->last_name,
                'email' =>  $request->email,
                'password' => Hash::make($request->password),
                'role_id' =>  $request->role
            ]);
        }

        if ($updated) 
            return back()->with('status', 'Success! Admin account updated');
        else  
            return back()->with('error', 'Failed to Update Admin account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // DELETE RECORD
        $deleted = User::where('id', $request->id)->delete();
        if($deleted)
            return back()->with('status', 'Success! Account deleted');
        else
            return back()->with('error', 'Failed to delete account');
    
    }
}
