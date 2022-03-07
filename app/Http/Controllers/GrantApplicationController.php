<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Grant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrantApplicationController extends Controller
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
     * ->where('id', $approved->id)
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approve = DB::table('lyf_approval')->where('status_id', 2)->get();
        if ($approve->count() > 0) {
            foreach ($approve as $approved) {
                $approveuser = DB::table('lyf_application')->paginate(2);
                return view('pages.grants', compact('approveuser'));
            }
        } else return "<script>alert('No APPROVAL given to Students Application')</script>" . back();
    }

    /**
     * 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
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
        $approve = Bank::where('approve_status', 2)->get();
        if ($approve->count() > 0) {
            foreach ($approve as $approved) {
                $bank = DB::table('lyf_bank')->where('user_id', $approved->user_id)->get();

                if ($bank->count() > 0 ) 
                    return view('backend.grantApp', compact('bank'));
                else if ($bank->count() == 0 ) 
                    return back()->with('error', 'Failed! No Bank Details for this student');
           }
        }
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
         // GRANT USER
           // check for form submit data
           switch ($request->input('save')) {
            
            case 'moneypaid':
                //  validate award
                $request->validate([
                    'amount' => 'required|integer',
                    'adminname' => 'required|string',
                    'from' => 'required|string',
                    'confirm' => 'required',
                    'aggree' => 'required',
                ]);
                
                $grants = Grant::where('lyf_account_id', $id)->update([
                    'amount' => $request->amount,
                    'admin_name' => $request->adminname,
                    'from' => $request->from,
                    'grant_status' => 1
                ]);

               if ($grants > 0) 
                   return back()->with('status', 'Successfull! Student GRANTED');
                else
                    return back()->with('error', 'Failed to grant student');

                break;
            default:
                'No GRANTS';
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
