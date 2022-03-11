<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApprovedApplicationController extends Controller
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

    public function index() {
        $approve_id = DB::table('lyf_approval')->where('status_id', 2)->get();
        foreach ($approve_id as $value) {
            $approved = DB::table('lyf_application')->orderBy('id', 'DESC')->paginate(2);
        }
        if (!isset($approved)) {
            return "<script>alert('No approved application')</script>" . back();
        }
        if(isset($approved)){
            return view('pages.approved', ['approved' => $approved]);
        }
    }
}
