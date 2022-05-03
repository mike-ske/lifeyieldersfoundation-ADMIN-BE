<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
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
        return view('pages.device');
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
            'requesting_officer' => 'required|string',
            'mobile' => 'required|numeric',
            'machine_model' => 'required|string',
            'serial_no' => 'required|alpha_num',
            'nature_of_fault' => 'required|string',
            'department' => 'required|string',
            'date_in' => 'required',
            'date_of_collection' => 'required',
            'workdone' => 'required|string',
            'workdone_by' => 'required|string',
        ]);
        // store
        $created = Device::create([
            'requesting_officer' => $request->requesting_officer,
            'mobile' => $request->mobile,
            'machine_model' => $request->machine_model,
            'serial_no' => $request->serial_no,
            'nature_of_fault' => $request->nature_of_fault,
            'department' => $request->department,
            'date_in' => $request->date_in,
            'date_of_collection' => $request->date_of_collection,
            'workdone' => $request->workdone,
            'workdone_by' => $request->workdone_by,
        ]);

        if( $created->count() > 0)
            return back()->with('status', 'Device successfully registered');
        else
            return back()->with('error', 'Failed to register device');

        
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
