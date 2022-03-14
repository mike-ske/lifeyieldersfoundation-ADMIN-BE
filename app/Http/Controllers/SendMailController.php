<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SendMail;
use App\Models\AdminEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SendMailController extends Controller
{
    //
    public function create(Request $request)
    {
        // validate
        $validate = $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:500',
            'body' => 'required|string'
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

    public function sendMailToStudent(Request $request)
    {
        dd($request);
        $validate = Validator::make($request->all(), [
            'toStudent' => 'required|email',
            'subject' => 'required|string|max:500',
            'message' => 'required|string'
        ]);
        // send mail
        if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()]);
        }
        // if ($request->toAdmin) 
        // {
        //     $admin_id = User::where('email', $request->toAdmin)->value('id');
        //     if ($admin_id > 0) {
        
        //         $sent = SendMail::create([
        //             'to' => $request->toAdmin,
        //             'from' => 'Lifeyieldersfoundation Body',
        //             'subject' => $request->subject,
        //             'body' => $request->message,
        //             'admin_id' => $admin_id,
        //             'role_id' => Auth::user()->role_id
        //         ]);
        //         if ($sent->count() > 0) 
        //             return response()->json(['result' => 'SUCCESS! MAIL SENT']);
        //         else
        //             return response()->json(['result' => 'FAILED! MAIL NOT SENT']);
    
        //     }
        //     else {
        //         return response()->json(['result' => 'Admin does not exist']);
        //     }
        // }
        if ($request->toStudent) 
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

    public function getmail()
    {
       $all = DB::table('admin_emails')->where('status_id', 1)->get('status_id')->count();
      
       if ($all > 1) {
           return response()->json(['notification' => $all]);
       }
       else
            return response()->json(['notification' => '']);
    }

    public function getapplication()
    {
        $all = DB::table('lyf_approval')->where('status_id', 0)->get('status_id')->count();
        if ($all > 1) {
            return response()->json(['notification' => $all]);
        }
        else
             return response()->json(['notification' => '']);
    }

    public function clearnotice()
    {
        $all = DB::table('admin_emails')->where('status_id', 1)->update([
            'status_id' => 0
        ]);
        if ($all > 1) {
            return response()->json(['notification' => '']);
        }
        else
             return response()->json(['notification' => 0]);
    }

}
