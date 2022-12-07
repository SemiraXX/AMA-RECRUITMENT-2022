<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\privacy;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class signincontroller extends Controller
{

    //visitor to login
    public function applicantindex(Request $request) 
    {
        return view('applicant.index');
    }


    //visitor to signup
    public function applicantsignup(Request $request) 
    {   
        $ip = $request->ip();
        $found = privacy::where('ip_address', '=', $ip)->first();

        if(!is_null($found))
        {
            $haveconsent = 1;
        }
        else
        {
            $haveconsent = 0;
        }
        

        return view('applicant.signup',[
        'haveconsent' => $haveconsent]);
    }


    //register visitor
    public function registeraccount(Request $request) 
    {
        $this->validate($request, [
	        'email' => 'email|required',
            'fname' => 'required',
            'lname' => 'required',
	        'password' => 'required|min:6'
        ]);

        $user = applicants::where('email', '=', $request->email)->first();

        if($user)
        {
            return back()->with('checknotes', "Email is already used.");
        }
        else
        {
            $applicant = new applicants([
                'userid' => $request->input('email'),
                'isverified' => 0,
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'mname' => "None",
                'suffix' => "None",
                'nickname' => "None",
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'gender' => "None",
                'contact_number' => "None",
                'complete_address' => "None",
                'province' => "None",
                'city' => "None",
                'brgy' => "None",
                'status' => "None",
                'code' => "None",
                'birthdate' => "None",
                'birthplace' => "None",
                'civilstatus' => "None",
                'citizenship' => "None",
                'religion' => "None",
                'mother_name' => "None",
                'father_name' => "None",
                'spouse' => "None",
                'drivers_license' => "None",
                'restriction' => "None",
                'no_of_siblings' => "None",
                'sss' => "None",
                'tin' => "None",
                'philhealth' => "None",
                'pagibig' => "None",
                'login_count' => +1,
                'last_login' =>  NOW()
            ]);
            $applicant->save();

        
                //send verification code
                /*require base_path("vendor/autoload.php");
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail ->IsHTML(true);
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587;
                $mail->SMTPSecure ='tsl';
                $mail->SMTPAuth = true;
                $mail->Username = 'ama.notification@gmail.com';
                $mail->Password =  'Letmein@2000';
                $mail->setFrom('ama.notification@gmail.com', 'AMA Notification');
                $mail ->Subject = 'Email verification';
                $mail ->Body = 'HEY';
    
                $emailsentto = $request->input('email');
                $mail ->AddAddress('belmontemaymaiky@gmail.com');

                if(!$mail->Send())
                    {
                        echo "Email not sent. Error"; 
                    }
                else
                    {
                        
                    }*/

                return back()->with('notes', "Successful! Proceed to login.");

        }

    }


    //validate login
    public function loginaccount(Request $request){
        
        $this->validate($request, [
	        'email' => 'email|required',
	        'password' => 'required|min:6'
        ]);

        $user = applicants::where('email', '=', $request->email)->first();
    
        if($user){
        
            if(Hash::check($request->password, $user->password)){
            
            $request->session()->put('applicantsession', $user->userid);

            DB::table('tbl_profile')
            ->where('email', '=', $user->email)
            ->update(
                array(
                    'login_count' => +1,
                    'last_login' => NOW()
                ));

            return redirect()->route('profile'); 

            }
            else
            {
                return back()->with('checknotes', "Wrong password/email!");
            }

        }
        else
        {
            return back()->with('checknotes', "Account not found! Sign up first.");
        }

    }

    

    //if visitor logout
    public function logout(Request $request)
    {
        Session::flush();
        return redirect()->route('loginpage');
    }



    //check if login or not before applying
    public function visitorapply(Request $request) 
    {
        if(session()->has('applicantsession')){

            $id = $request->input('id');

            $specificjd = DB::table('JDMaster')->where('JDCode', $id)->first();
            $applicants = applicants::where('userid', '=', session('applicantsession'))->first();
            
            return view('applicant.submitapplication',
            ['applicants' => $applicants,
            'specificjd' => $specificjd]);    
        }
        else
        {
            return redirect()->route('signup'); 
        }
    }



}
