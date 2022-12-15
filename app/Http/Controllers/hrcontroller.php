<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\adminmovement;
use App\Models\nonacad;
use App\Models\uploadedresume;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;


class hrcontroller extends Controller
{


    //FORMAL HR login
    public function hrlogin(Request $request) 
    {
        $this->validate($request, [
	        'username' => 'required',
	        'password' => 'required|min:6'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        //$user = applicants::where('email', '=', $request->email)->first();
    
        if(($username == "01043127") && ($password ==  "@admindefault2022")){
        
            //if(Hash::check($request->password, $user->password)){
            
            $request->session()->put('hradminsessionid', $username);

            
            #save movement trail of HR
            $adminmovement = new adminmovement([
                'userid' => $username,
                'usertype' => "HR",
                'action_taken' => "User successfully logged-in",
                'otherRemarks' => "Login",
                'ipaddress' => $request->ip(),
                'httpbrowser' => $request->userAgent(),
                'date_logged' => NOW()
            ]);
            $adminmovement->save();


            #redirect to HR dashboard
            return redirect()->route('hr.dashboard'); 

            //}
            //else
            //{
            //    return back()->with('checknotes', "Wrong password/email!");
            //}

        }
        else
        {
            return back()->with('checknotes', "Account not found! Sign up first.");
        }

    }
    
    
    
    //visitor to login
    public function hrdashboard(Request $request) 
    {

        if(session()->has('hradminsessionid'))
        {
            return view('hr.dashboard');
        }
        else
        {
            return back()->with('checknotes', "Try to login first");
        }
    
    }


    
    //get shortlisted
    public function displayshortlisted(Request $request) 
    {
        $allapplications = applications::where('status', '!=', 'Awaiting')
        ->where('status', 'For-Initial-Interview')
        ->orWhere('status', 'For-Exam')
        ->orWhere('status', 'For-Interview')
        ->orWhere('status', 'For-Exam-and-Essay')
        ->orderBy('date_applied', 'DESC')
        ->get();
             
        return view('hr.shortlisted',
        ['allapplications' => $allapplications]);
    }



    //get shortlisted
    public function displayforprocessing(Request $request) 
    {
        $allapplications = applications::Where('status', 'For-Final-Interview')
        ->orWhere('status', 'For-Final-Decision-of-Management')
        ->orWhere('status', 'For-Job-Offer')
        ->orWhere('status', 'For-Pre-Employment-Requirements')
        ->orderBy('id', 'DESC')
        ->get();
             
        return view('hr.processing',
        ['allapplications' => $allapplications]);   

    }


    //get for evaluation
    public function displayforevaluation(Request $request) 
    {
        $allapplications = applications::where('status', '!=', 'Awaiting')
        ->where('status', 'For-Evaluation')
        ->orWhere('status', 'For-Criteria-Evaluation')
        ->orderBy('id', 'DESC')
        ->get();
             
        return view('hr.forevaluation',
        ['allapplications' => $allapplications]);   
    }





    //get for onboarding
    public function displayforonboarding(Request $request) 
    {
        $allapplications = applications::where('status', '!=', 'Awaiting')
        ->where('status', 'For-Onboarding')
        ->orderBy('id', 'DESC')
        ->get();
             
        return view('hr.onboarding',
        ['allapplications' => $allapplications]);   

    }





    //view dept head requests
    public function displaydeptheadrequest(Request $request) 
    {
        $nonacad = nonacad::orderBy('date_filed', 'DESC')->get();
             
        return view('hr.requests',
        ['nonacad' => $nonacad]);

    }



    //display all resume
    public function displayallresume(Request $request) 
    {
        $uploadedresume = uploadedresume::orderBy('date_submitted', 'DESC')->get();
    
        return view('hr.resume',
        ['uploadedresume' => $uploadedresume]);

    }



}
