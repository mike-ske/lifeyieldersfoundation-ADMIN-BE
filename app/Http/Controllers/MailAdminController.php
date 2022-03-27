<?php

namespace App\Http\Controllers;


use App\Models\SendMail;
use App\Models\AdminEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class MailAdminController extends Controller
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
     * 
     */
    public function index()
    {
        // Authorization access
        Gate::authorize('edit-settings');
        
        $mail = AdminEmail::orderBy('created_at', 'DESC')->paginate(50);
        // $genEmail = Sendmail::paginate(50);          
        return view('pages.mails', compact('mail'));
        
        // if ($mail->count() > 0 ) 
        // else if ($mail->count() == 0 ) 
        //     return view('pages.mails', ['mail' => 'No mail found']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.sendMail');
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
        $validate = Validator::make($request->all(), [
            'toStudent' => 'required|email',
            'subject' => 'required|string|max:500',
            'message' => 'required|string'
        ]);
        // send mail
        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()]);
        }

        // dd($validate);
        $student_id = DB::table('lyf_account')->where('email', $request->toStudent)->value('id');
        if ($student_id > 0){

            $sent = DB::table('lyf_email')->insert([
                'user_id' => $student_id,
                'role_id' => Auth::user()->role_id,
                'mail_subject' => $request->subject,
                'mail_body' => $request->message
            ]);
            if ($sent == 1) 
                return response()->json(['success' => 'SUCCESS! MAIL SENT']);
            else
                return response()->json(['failed' => 'FAILED! MAIL NOT SENT']);  
        }
        else {
            return response()->json(['failed' => 'User does not exist']);
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
        // Authorization access
        Gate::authorize('edit-settings');
        // GET each mail ADMIN
        $emails = AdminEmail::where('id', $id)->get();
        AdminEmail::where('status_id', 1)->where('id', $id)->update([
            'status_id' => 0
        ]);
        return view('backend.mailAdmin', compact('emails'));
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
    public function destroy(Request $request)
    {
        $mail = AdminEmail::where('id', $request->id)->delete();
        if($mail > 0)
            return back()->with('status', 'Success! Mail deleted');
        else
            return back()->with('error', 'Failed to delete mail');
        
    }
}
