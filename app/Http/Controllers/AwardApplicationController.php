<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Score;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AwardApplicationController extends Controller
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
                $approveuser = DB::table('lyf_application')->where('id', $approved->id)->paginate(2);
                return view('pages.award', compact('approveuser'));
            }
        }
        else return "<script>alert('No Students APPLICATION APPROVED')</script>".back();
      
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

    /**Papprap
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        function isMobileDevice() {
            return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
        }
        if(isMobileDevice()){
            echo "<script>
                        alert('YOU CANNOT VIEW THIS PAGE ON MOBILE OR TABLET SCREENS.');
                       
                        document.write('You will be redirected to main page in 1 sec.........');
                        window.location = '/';
                    </script>";
        }
        else {
            // echo "<script>alert('It is desktop or computer device')</script>";
           
        }

        // get user score
        $score = Score::where('user_id', $id)->value('score');
        // dd($score);
        $approve = DB::table('lyf_approval')->where('status_id', 2)->get();
        if ($approve->count() > 0) {
            foreach ($approve as $approved) {
                $user = DB::table('lyf_account')->where('id', $approved->id)->get();
                return view('backend.awardApp', compact('score', 'user'));
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
         // check for form submit data
         switch ($request->input('save')) {
            
            case 'award':
                //  validate award
                $request->validate([
                    'awardtype' => 'required',
                ]);
                $award = Award::where('user_id', $id)->update([
                    'award_type' => $request->award,
                    'award_status' => 1,
                ]);
               if ($award->) 
                   return back()->with('status', 'Successfull! Student AWARDED');
                else
                    return back()->with('error', 'Failed to award student');

                break;
            case 'mail':

                $request->validate([
                    'file' => 'required|mimes:pdf',
                    'message' => 'required|max:2000',
                ]);

                $data = Award::where('user_id', $id)->update([
                    'award_file' => $request->file,
                ]);

                $mail = DB::table('lyf_email')->where('user_id', $id)->update([
                    'mail_subject' => 'Certificate of Award From Lifeyieldersfoundations Body',
                    'mail_body' => $request->message,
                    'role_id' => Auth::user()->id
                ]);
                if($data !== '' || $mail !== '')
                    return back()->with('status', 'Success! Award Certificate Added');
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