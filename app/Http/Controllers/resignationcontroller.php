<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\bypassing;
use App\Models\requirements;
use App\Models\resignedrecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;


class resignationcontroller extends Controller
{
    //display all resigned
    public function listofresigneds(Request $request) 
    {   
        if(session()->has('deptheadsession'))
        { 
            $sessiongetid = bypassing::where('session_id', session('deptheadsession'))->first();

            //sqlsrv3 is payroll db
            $resigned = DB::connection('sqlsrv3')
            ->table('ResignationForms')
            ->where('Department', $sessiongetid->dept)
            ->where('Branch', $sessiongetid->branch)
            ->limit(15)
            ->orderBy('RequestDate')
            ->get();

            return view('depthead.dashboard',
            ['resigned' => $resigned]);

        }
        else
        {
            echo '<meta http-equiv="refresh" content="0;url=https://recruitment.amaes.com/Err">';
        
        } 

    }
}
