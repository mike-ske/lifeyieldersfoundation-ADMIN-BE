<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
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
        $approve = DB::table('lyf_approval')->where('status_id', 0)->orderBy('created_at')->get();
      
        foreach ($approve as $app) {
            // dd($app);
            $application = DB::table('lyf_application')->where('id', $app->application_id)->paginate();
           
        }
        if (!isset($application))
            return "<script>alert('No new student application')</script>" . back();
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
        $student = DB::table('lyf_application')->where('user_id', $id)->get();
        $bank = DB::table('lyf_bank')->where('user_id', $id)->get();
     
        return view('backend.studentApp', compact('student', 'bank'));
        
    }

    public function getPdf($pdfstring)
    {
        return base64_decode($pdfstring);
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

                $data = DB::table('lyf_approval')->where('application_id', $request->pendinguser)->update(['status_id' => 1]);
                
                DB::table('scores')->insert([
                    'user_id' => $request->userId,
                    'application_id' => $request->pendinguser,
                ]);
                DB::table('banks')->insert([
                    'user_id' => $request->userId,
                    'application_id' => $id,
                ]);
               
                if($data !== '')
                    return back()->with('status', 'Application pending');
                break;
            case 'decline':
                $data = DB::table('lyf_approval')->where('application_id', $request->pendinguser)->update(['status_id' => 0]);
                if($data !== '')
                    return back()->with('status', 'Application decline');

                break;
            case 'score':
                // validate score
                $request->validate([
                    'score' => 'required|integer|max:100|unique:scores',
                ]);
                // Insert to database
                DB::table('scores')->where('application_id', $request->appId)->update([
                    'score' => $request->score
                ]);
                return back()->with('status', 'Student Score added');
                break;
            case 'bankpending':
                $data = DB::table('banks')->where('application_id', $id)->update(['approve_status' => 1, 'bank' =>  $request->pendinguser]);
                if($data !== '')
                    return back()->with('status', 'Bank information pending');
       
                break;
            case 'bankdecline':
                $data = DB::table('banks')->where('application_id', $id)->update(['approve_status' => 0]);
                if($data !== '')
                    return back()->with('status', 'Bank information declined');

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
    public function destroy($id)
    {
        //
    }
}
