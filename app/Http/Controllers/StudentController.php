<?php

namespace App\Http\Controllers;

use App\Models\Grant;
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

        $student = DB::table('lyf_account')->orderBy('id', 'DESC')->paginate(50);
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
        
        // validate request 
        $r = $request->validate([
            'about' => 'required|string',
            'first_name' => 'required|string|min:5',
            'last_name' => 'required|string|min:5',
            'email' => 'required|string|email',
            'password' => 'required|string'
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
    public function destroy(Request $request)
    {
        // DELETE RECORD
        $deleted = DB::table('lyf_account')->where('id', $request->id)->delete();
        $approvaltb = DB::table('lyf_approval')->where('user_id', $request->id)->delete();
        $applytb = DB::table('lyf_application')->where('user_id', $request->id)->delete();
        $granttb = Grant::where('lyf_account_id', $request->id)->delete();
        $bank = DB::table('lyf_bank')->where('user_id', $request->id)->delete();
        if($deleted > 0 || $granttb > 0 || $approvaltb > 0 || $bank > 0 || $applytb > 0)
            return back()->with('status', 'Success! Student deleted');
        else
            return back()->with('error', 'Failed to delete application');
    }

}
