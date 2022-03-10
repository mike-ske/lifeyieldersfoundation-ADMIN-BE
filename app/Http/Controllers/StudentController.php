<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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

        $student = DB::table('lyf_account')->orderBy('created_at', 'desc')->paginate(2);
        if ($student) 
            return view('pages.student', compact('student'));
        else 
            return "<script>alert('No student account')</script>" . back();
            // return redirect()->route('pages.student');
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         // Authorization access
         Gate::authorize('edit-settings');
        $student = DB::table('lyf_account')->where('id', $id)->get();
        //show each student
        return view('backend.studentProfile', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        dd(DB::table('lyf_account')->where('id', $id)->update(['fname' =>  $request->first_name]) );
        // validate request 
        $request->validate([
            'about' => 'required|string|max:2000',
            'fname' => 'required|string|max:40',
            'lname' =>  'required|string|max:40',
            'email' =>  'required|string|max:40|email|unique:users',
            'password' => 'required|string|max:40'
        ]);
        // save data 
        $updated = DB::table('lyf_account')->where('id', $id)->update([
            'fname' =>  $request->first_name,
            'lname' =>  $request->last_name,
            'email' =>  $request->email,
            'password' =>  Hash::make($request->password),
            'about' =>  $request->about
        ]);
        
        if ($updated > 0) 
            return back()->with('status', 'Student account updated');
        else  
            return back()->with('error', 'Failed to Update student account');
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
