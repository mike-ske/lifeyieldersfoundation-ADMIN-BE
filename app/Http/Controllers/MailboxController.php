<?php

namespace App\Http\Controllers;

use App\Mail\mailbox as MailMailbox;
use App\Models\Mailbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailboxController extends Controller
{
    public function sendMail(Request $request)
    {          // validate
       
        $validate = Validator::make($request->all(), [
            'tomailer' => 'required|email',
            'subject' => 'required|string|max:500',
            'message' => 'required'
        ]);
        
       if ($validate->fails()) {
            return response()->json(['message' => $validate->errors()]);
       }

        // INSERT DATA TO DB
        $send = Mailbox::create([
            'to' => $request->tomailer,
            'subject' => $request->subject,
            'from' => 'Lifeyieldersfoundation',
            'body' => $request->message,
        ]);

        // SEND MESSAGE TO MAIL
        if ($send->count() > 0) {
            Mail::to($request->tomailer)->send(new MailMailbox($request));
            return response()->json(['success' => 'Successfull! Mail sent'], 200);
        }
    }
}
