<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SendMailController extends Controller
{
   
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
