<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SearchController extends Controller
{
    public function search($searchId)
    {
        // $device=DB::select('select * from devices where machine_model LIKE= %'.$searchId.'%');
    $device=DB::table('devices')->where('machine_model', 'LIKE', '%'.$searchId.'%')->get();
          
    if ($device->count() > 0) {
     
        foreach ($device as  $devices) {
            // dd($devices);
            $dv_id = $devices->id;
            $deviceItem = "<div class='inner'>
                                <a href='/application/{$dv_id}'>
                                    <h1 style='font: size 24px !important;' id='alert' class='mb-2 text-md font-bold text-blue-500 dark:text-blue-500 underline '>".Str::upper($devices->machine_model)."</h1>
                                </a>
                                <ul>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Requesting Officer:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->requesting_officer."</h3></li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Serial No:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->serial_no."</h3></li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Nature Of Fault:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->nature_of_fault."</h3> </li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Department:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->department."</h3></li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Date Of Registry:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->date_in."</h3> </li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Date of Collection:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->date_of_collection."</h3> </li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Work Satatus:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->workdone."</h3> </li>
                                    <li class='mb-2 sm:flex items-center justify-start'><h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Engineer / Fixer:</h3> - <h3 id='alert' class=' text-sm font-bold text-gray-500 dark:text-gray-200'>".$devices->workdone_by."</h3> </li>
                                </ul>
                            </div>
                            ";
        //    Response::json();
            return response()->json(['device' => $deviceItem]);
        }
    }
    else
        return response()->json(['device' => "<h3 id='alert' class=' mr-2 text-sm font-normal text-gray-500 dark:text-gray-100'>Sorry, No Device Found</h3>"]);
    } 

    
}
