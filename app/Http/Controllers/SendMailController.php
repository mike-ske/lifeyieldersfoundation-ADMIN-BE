<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SendMailController extends Controller
{
    //
    public function create(Request $request)
    {
        
        // validate
        $validate = $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:500',
            'body' => 'required'
        ]);
        // send mail
       if ($validate) {
            return response()->json(['result' => $validate]);
       }
        if ($request->toAdmin) 
        {
            $admin_id = User::where('email', $request->toAdmin)->value('id');
            if ($admin_id > 0) {
        
                $sent = SendMail::create([
                    'to' => $request->toAdmin,
                    'from' => 'Lifeyieldersfoundation Body',
                    'subject' => $request->subject,
                    'body' => $request->message,
                    'admin_id' => $admin_id,
                    'role_id' => Auth::user()->role_id
                ]);
                if ($sent->count() > 0) 
                    return response()->json(['result' => 'SUCCESS! MAIL SENT']);
                else
                    return response()->json(['result' => 'FAILED! MAIL NOT SENT']);
    
            }
            else {
                return response()->json(['result' => 'Admin does not exist']);
            }
        }
        if ($request->toAdmin) 
        {
            $student_id = DB::table('lyf_account')->where('email', $request->toStudent)->value('id');
            if ($student_id > 0) {
        
                $sent = DB::table('lyf_email')->insert([
                    'user_id' => $student_id,
                    'role_id' => Auth::user()->role_id,
                    'mail_subject' => $request->subject,
                    'mail_body' => $request->message
                ]);
                if ($sent == 1) 
                    return response()->json(['result' => 'SUCCESS! MAIL SENT']);
                else
                    return response()->json(['result' => 'FAILED! MAIL NOT SENT']);
    
            }
            else {
                return response()->json(['result' => 'User does not exist']);
            }
        }
        

       


    }
}
