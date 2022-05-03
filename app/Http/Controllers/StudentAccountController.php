<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class StudentAccountController extends Controller
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
        $student = DB::table('students')->orderBy('id', 'DESC')->paginate(20);
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
        $student = DB::table('students')->where('id', $id)->get();
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
        
        // validate request 
        $r = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'residential_address' => 'required',
            'start_duration' => 'required',
            'end_duration' => 'required'
        ]);
       
        // save data 
        $updated = DB::table('students')->where('id', $id)->update([
            'surname' =>  $request->first_name,
            'first_name' =>  $request->last_name,
            'email_address' =>  $request->email,
            'phone' =>  $request->phone,
            'residential_address' =>  $request->residential_address,
            'start_duration' =>  $request->start_duration,
            'end_duration' =>  $request->end_duration
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
    public function destroy(Request $request)
    {
        // DELETE RECORD
        $deleted = DB::table('students')->where('id', $request->id)->delete();
        $bank = DB::table('lyf_bank')->where('user_id', $request->id)->delete();
        if($deleted > 0 || $bank > 0)
            return back()->with('status', 'Success! Student deleted');
        else
            return back()->with('error', 'Failed to delete application');
    }

}
