<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Grant;
use App\Models\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PendingApplicationController extends Controller
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
        // Authorization access
        Gate::authorize('edit-settings');
        $pending_id = DB::table('lyf_approval')->where('status_id', 1)->get();
        if($pending_id->count() > 0){
            foreach ($pending_id as $value) {
               $pending =  DB::table('lyf_application')->paginate(2);
            }
        }
        // dd( $pending_id);
         if (!isset($pending))
             return "<script>alert('No pending application')</script>" . back();
         else
             return view('pages.pending', compact('pending'));

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
        // Authorization access
        Gate::authorize('edit-settings');
        $student = DB::table('lyf_application')->where('user_id', $id)->get();
        $bank = DB::table('lyf_bank')->where('user_id', $id)->get();
        
        return view('backend.pendingApp', compact('student', 'bank'));
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
        // Authorization access
        Gate::authorize('edit-settings');
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

                $data = DB::table('lyf_approval')->where('application_id', $request->pendinguser)->update(['status_id' => 2]);
                
                Interview::insert([
                    'lyf_approval_id' => 2,
                    'user_id' => $id
                ]);
                DB::table('banks')->insert([
                    'application_id' => $request->pendinguser,
                    'user_id' => $id
                ]);
                // APPROVE THE AWARD TABLE
                Award::insert([
                    'lyf_approval_id' => 2,
                    'user_id' => $id,
                ]);
                Grant::insert([
                    'lyf_account_id' => $id,
                    'award_id' => 0,
                ]);
                
                if($data !== '')
                    return back()->with('status', 'Application APPROVED');
                break;
            case 'decline':
                $data = DB::table('lyf_approval')->where('application_id', $request->pendinguser)->update(['status_id' => 0]);
                // DECLINE THE AWARD TABLE
                Award::where('lyf_approval_id', 1)->update([
                    'lyf_approval_id' => 0,
                    'award_file' => 0
                ]);
                Interview::where('lyf_approval_id', 2)->update([
                    'lyf_approval_id' => 0,
                    'user_id' => 0
                ]);

                if($data !== '')
                    return back()->with('error', 'Application decline');
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
                $data = DB::table('banks')->where('application_id', $id)->update(['approve_status' => 2, 'bank' =>  $request->pendinguser]);
                if($data !== '')
                    return back()->with('status', 'Bank information APPROVED');
       
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
    public function destroy($id)
    {
        //
    }
}
