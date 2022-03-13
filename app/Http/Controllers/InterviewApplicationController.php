<?php

namespace App\Http\Controllers;

use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InterviewApplicationController extends Controller
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
        //
        $approve = DB::table('lyf_approval')->where('status_id', 2)->get();
        if ($approve->count() > 0) {
            foreach ($approve as $approved) {
                $approveuser = DB::table('lyf_application')->paginate(50);
                return view('pages.interview', compact('approveuser'));
            } 
        }else return "<script>alert('No APPROVED Students Application')</script>" . back();
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
        // Get interview 
        $student = DB::table('lyf_application')->where('user_id', $id)->get();
        return view('backend.interviewApp', compact('student'));
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
         // INTERVIEW USER
           // check for form submit data
           switch ($request->input('save')) {
            
                case 'mail':
                    //  validate award
                    $request->validate([
                        'subject' => 'required|string',
                        'url' => 'required|url',
                        'message' => 'required|string'
                    ]);
                    
                    $interview = Interview::where('lyf_approval_id', 2)->where('user_id', $id)->update([
                        'interview_link' => $request->url,
                        'message' => $request->message,
                        'subject' => $request->subject,
                    ]);

                    DB::table('lyf_email')->insert([
                        'mail_body' => $request->url .' '.$request->message, 
                        'mail_subject' => $request->subject, 
                        'user_id' => $id, 
                        'role_id' => Auth::user()->id
                    ]);

                    // SEND MAIL TO USERS EMAIL ADDRESS
                    // $request->email;

                    if ($interview > 0) 
                        return back()->with('status', 'Successfull! Interview Sent');
                    else
                        return back()->with('error', 'Failed to Send Interview Invite');

                    break;
                default:
                    'No interview given';
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
        $award = Interview::where('user_id', $request->id)->delete();
        if($award > 0  )
            return back()->with('status', 'Success! Student Interviews deleted');
        else
            return back()->with('error', 'Failed to delete interviews');
        
    }
}
