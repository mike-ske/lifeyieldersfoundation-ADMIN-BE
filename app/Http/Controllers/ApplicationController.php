<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *  
     * SET MIDDLEWARE FOR THIS ADMIN MAKE SURE THE USER 
     * IS AUTHENTICATED BEFORE HE ACCESS THIS ROUTE
     *
     * where('id', $app->application_id)
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
        
        $approve = DB::table('devices')->orderBy('created_at')->get();
      
        foreach ($approve as $app) {
            // dd($app);
            $application = DB::table('devices')->orderBy('id', 'DESC')->paginate(20);
        }
        if (!isset($application))
            return "<script>alert('No new device registered')</script>" . back();
        else
            return view('pages.application', compact('application'));
        
     
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $student = DB::table('devices')->where('id', $id)->get();
        // DB::table('students')->where('notif', 0)->where('user_id', $id)->update([
        //     'notif' => 1
        // ]);
        return view('backend.deviceApp', compact('student'));
        
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
        // check for form submit data
        switch ($request->input('save')) {
            case 'mailsave':
                //  validate mail
                $request->validate([
                    'subject' => 'required|string|max:225',
                    'message' => 'required|string|max:2000'
                ]);
                DB::table('lyf_email')->insert([
                    'mail_subject' => $request->subject,
                    'status_id' => 0,
                    'user_id' => $request->user_id,
                    'mail_body' => $request->message,
                    'role_id' => Auth::user()->role_id
                ]);
               
                return back()->with('status', 'Mail sent to this student');

                break;
            case 'pend':
                
                $data = DB::table('devices')->where('id', $request->userId)->update(['workdone' => 'Fixed']);
                
                if($data == 1)
                    return back()->with('status', 'Device Fixed');
                else  
                    return back()->with('error', 'Failed! Device Not Fixed');

                break;
            case 'print':
                $data = DB::table('devices')->where('id', $id)->get();
                if($data->count() > 0)
                    return view('pages.printcard', compact('data') );

                break;
            case 'score':
                    // validate score
                    $request->validate([
                        'score' => 'required|integer|max:100|unique:scores',
                    ]);

                    // Insert to database
                    $updated = Score::where('application_id', $id)->update([
                        'score' => $request->score
                    ]);

                    if ($updated > 0) 
                        return back()->with('status', 'Student Score added');
                    else  
                        return back()->with('error', 'Failed to Add Students Score');

                        break;
            case 'bankpending':
                $data = DB::table('banks')->where('application_id', $id)->update(['approve_status' => 1, 'bank' =>  $request->pendinguser]);
                if($data !== '')
                    return back()->with('status', 'Bank information pending');
       
                break;
            case 'bankdecline':
                $data = DB::table('banks')->where('application_id', $id)->update(['approve_status' => 0]);
                if($data !== '')
                    return back()->with('error', 'Bank information declined');

                break;
            default:
                'No post';
        }
   
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
        $deleted = DB::table('lyf_application')->where('user_id', $request->id)->delete();
        // $approvaltb = DB::table('lyf_approval')->where('user_id', $request->id)->delete();
        $banktb = DB::table('lyf_bank')->where('user_id', $request->id)->delete();
        $granttb = Grant::where('lyf_account_id', $request->id)->delete();
        
        if($deleted == 1 ||  $granttb == 1 || $banktb == 1)
            return back()->with('status', 'Application deleted');
        else
            return back()->with('error', 'Failed to delete application');
    
    }
}
