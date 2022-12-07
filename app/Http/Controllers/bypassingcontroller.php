<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\bypassing;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class bypassingcontroller extends Controller
{

    //authenticate parameter from KP
    public function authenticatelogin(Request $request) 
    {
        $branch = $request->input('branch');
        $department = $request->input('department');
        $token = $request->input('_token');
        $userid = $request->input('userid');
        $position = $request->input('position');

            $EmpMaster = DB::connection('sqlsrv3')
            ->table('EmpMaster')
            ->where('DeptCode', $department)
            ->where('BranchCode', $branch)
            ->get();


            if(!$EmpMaster->isEmpty())
            {
                
                //save logs
                $bypassing = new bypassing([
                    'branch' => $branch,
                    'dept' => $department,
                    'userid' => $userid,
                    'category' => "DeptHead",
                    'position' => $position,
                    'session_id' => $token,
                    'date_logged' => NOW()
                ]);
                $bypassing->save();


                //create session
                $request->session()->put('deptheadsession', $token);


                //redirect
                return redirect()->route('head.dashboard'); 

            }
            else
            {
                return view('err.notfound');
            }

    }

    public function notallowed(Request $request) 
    {
        return view('err.notallowed');
    }


    //authenticate parameter from KP
    public function flushsessions(Request $request) 
    {
        Session::flush();
    }



}
