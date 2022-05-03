<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.regstudent');
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
           // validate
           $this->validate($request,[
            'surname' => 'required|string',
            'first_name' => 'required|string',
            'gender' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required',
            'residential_address' => 'required|string',
            'state_of_origin' => 'required',
            'nationality' => 'required',
            'school' => 'required|string',
            'course_of_study' => 'required|string',
            'programme' => 'required|string',
            'start_duration' => 'required',
            'end_duration' => 'required',
        ]);
        // store
        $created = Student::create([
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'gender' => $request->gender,
            'email_address' => $request->email,
            'phone_number' => $request->phone_number,
            'residential_address' => $request->residential_address,
            'state_of_origin' => $request->state_of_origin,
            'nationality' => $request->nationality,
            'school' => $request->school,
            'course_of_study' => $request->course_of_study,
            'programme' => $request->programme,
            'start_duration' => $request->start_duration,
            'end_duration' => $request->end_duration,
        ]);

        if( $created->count() > 0)
            return back()->with('status', 'Student successfully registered');
        else
            return back()->with('error', 'Failed to register student');

        
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
        //
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
