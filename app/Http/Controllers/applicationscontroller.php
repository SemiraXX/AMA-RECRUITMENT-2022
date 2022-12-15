<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use App\Models\resume;
use App\Models\uploadedresume;
use App\Models\jobs;
use App\Models\applicantreplies;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;


class applicationscontroller extends Controller
{
    //APPLY FOR A JOB
    public function applyJOB(Request $request) 
    {
        if(session()->has('applicantsession')){

            $id = $request->input('id');

            $specificjd = DB::table('JDMaster')->where('JDCode', $id)->first();
            $applicants = applicants::where('userid', '=', session('applicantsession'))->first();
            $resume = resume::where('userid', '=', session('applicantsession'))->first();
            
            return view('applicant.applications.submitapplication',
            ['applicants' => $applicants,
            'specificjd' => $specificjd,
            'resume' => $resume]);    
        }
        else
        {
            return redirect()->route('signup'); 
        }
    }

    //user apply job
    public function userapply(Request $request) 
    {
        if(session()->has('applicantsession')){


            $id = $request->input('id');

            //create application ID
            #get profile user ID + JDCODE
            $applicants = applicants::where('userid', '=', session('applicantsession'))->first();

            //$specificjd = DB::table('JDMaster')->where('JDCode', $id)->first();
            #get posted job details
            $jobs = jobs::where('id', '=', $id)->first();
            $specificjd = DB::table('JDMaster')->where('JDCode', $jobs->JDCode)->first();

            #merge
            $applicationID = $applicants->id.$jobs->JDCode;
            
            $resume = resume::where('userid', '=', session('applicantsession'))->first();
            
            return view('applicant.applications.submitapplication',
            ['applicants' => $applicants,
            'specificjd' => $specificjd,
            'resume' => $resume,
            'applicationID' => $applicationID]);    
        }
        else
        {
            return back()->with('notes', "Please Login!");
        }
    }



    //SUBMIT 
    public function submitconsentform(Request $request) 
    {
        if(session()->has('applicantsession')){

            $name = $request->input('name'); 
            $fileName = time().'.'.$request->name->extension();  
            $request->name->move(public_path('/files'), $fileName);
            	
            $consent = new consent([
                'formid' => session('applicantsession'),
                'userid' => session('applicantsession'),
                'date_applied' => NOW(),
                'mrf_type' => 0,
                'mrf_number' => 001,
                'position_applying' => "None",
                'status' => "Completed",
                'url_file' =>  $fileName
            ]);
            $consent->save();
    
            return back()->with('notes', "Success, finish your application");
           
        }
        else
        {
            return redirect()->route('signup'); 
        }
    }


    //SUBMIT APPLICATION
    public function submitapplications(Request $request) 
    {
        if(session()->has('applicantsession')){
        
            $applicationID = $request->input('applicationID');

            $applications = new applications([
                'status' => "Awaiting",
                'application_id' => $applicationID,
                'userid'  => $request->input('email'),
                'date_applied' => NOW(),
                'mrf_type' => 0,
                'mrf_number' => rand(0, 999999),
                'lname' => $request->input('lname'),
                'fname' => $request->input('fname'),
                'mname' => $request->input('mname'),
                'suffix' => $request->input('suffix'),
                'nickname' => $request->input('nickname'),
                'email' => $request->input('email'),
                'gender' => $request->input('gender'),
                'contact_no' => $request->input('contact_number'),
                'present_address' => $request->input('present_address'), 
                'province' => $request->input('province'),
                'city' => $request->input('city'),
                'birth_place' => $request->input('birthplace'),
                'civil_status' => $request->input('civilstatus'),
                'citizenship' => $request->input('citizenship'),
                'religion' => $request->input('religion'),
                'employment_status' => $request->input('employed'),
                'driving_license_type' => $request->input('drivers_license'),
                'restriction' => $request->input('restriction'),
                'other_license' => $request->input('professional_license'),
                'no_of_siblings' => $request->input('no_of_siblings'),
                'no_of_children' => "0", 
                'spouse' => $request->input('spouse'),
                'mother_name' => $request->input('mother_name'),
                'father_name' => $request->input('father_name'),
                'sss' => $request->input('sss'),
                'tin' => $request->input('tin'),
                'philhealth' => $request->input('philhealth'),
                'pagibig' => $request->input('pagibig'),
                'professional_license' => $request->input('professional_license'),
                'employed' => $request->input('employed'),
                'previouly_employed' => $request->input('previouly_employed'),
                'related_to_ama_employee' => $request->input('related_to_ama_employee'),
                'been_dismissed' => $request->input('been_dismissed'),
                'involved_in_criminal_case' => $request->input('involved_in_criminal_case'),
                'position_applying' => $request->input('position_applying'),
                'desired_salary' => $request->input('desired_salary'),
                'latin_awards_honors' => $request->input('latin_awards_honors'),
                'tesda_cerfitification' => $request->input('tesda_cerfitification'),
                'when_hear_about_us' => $request->input('when_hear_about_us')
            ]);
            $applications->save();



            //make a copy of resume
            #get file in resume file 
            $getresume = resume::where('userid', '=', session('applicantsession'))->first();

            #if has no resume or have
            if($getresume)
            {
                $uploadedresume = new uploadedresume([
                    'userid' => $getresume->userid,
                    'applicationID' => $applicationID,
                    'file_name' => $getresume->file_name,
                    'file_url' => $getresume->file,
                    'tagName' => "Uploaded with Application",
                    'remarks' => "RESUME",
                    'date_submitted' => NOW()
                ]);
                $uploadedresume->save();
            }
            else
            {

            }

            return redirect()->route('user.applications'); 
            
        }
        else
        {
            return redirect()->route('signup'); 
        }

    }


     //ALL SUBMITTED APPLICATIONS
     public function submittedapplications(Request $request) 
     {
         if(session()->has('applicantsession'))
         {   
             $applications = applications::where('userid', '=', session('applicantsession'))
             ->orderBy('id', 'DESC')->get();
             
             return view('applicant.applications.applications',
             ['applications' => $applications]);   
         }
         else
         {
             return back()->with('notes', "Please Login!");
         }
     }
 






     

     //manage application
     public function viewapplicationdetail(Request $request) 
     {   if(session()->has('applicantsession'))
        {
            $id = $request->input('id');
 
            $applications = applications::where('id', $id)->first();
            
            $lateststatus = status::where('application_id', $applications->application_id)
            ->orderBy('id', 'DESC')
            ->first();

            if($lateststatus)
            {
                $applicationstatuses = status::where('application_id', $applications->application_id)
                ->where('status', '!=', $lateststatus->status)
                ->orderBy('id', 'DESC')
                ->get();
            }
            else
            {
                $applicationstatuses = status::where('application_id', $applications->application_id)
                ->orderBy('id', 'DESC')
                ->get();
            }
            

            $examresults = answer::where('applicationid', $applications->application_id)->get();
            $requirements = requirements::where('application_id', $applications->application_id)->get();
            $documents = DB::table('ApplicantRequirements')->where('ClassType', 'NONACAD')->get();

            $credentials = DB::table('ApplicantRequirements')
            ->where('ClassType', 'NONACAD')
            ->get();
            
 
            return view('applicant.applications.applicationview',
             ['applications' => $applications,
             'applicationstatuses' => $applicationstatuses,
             'lateststatus' => $lateststatus,
             'examresults' => $examresults,
             'requirements' => $requirements,
             'documents' => $documents,
             'credentials' => $credentials]);  
        }
        else
        {
            return back()->with('notes', "Please Login!");
        }
     }
     public function submitexamanswers(Request $request) 
     {   
         $answers = $request->input('answer');
         $question = $request->input('question');
         $code = $request->input('code');
         $application_id = $request->input('application_id');

         $applications = applications::where('application_id', $application_id)->first();
        
            for($i=0;$i<count($question);$i++){

                if($answers[$i] == "none")
                {
                    $answer = new answer([
                        'userid' =>  $applications->userid,
                        'applicationid' =>  $applications->application_id,
                        'question_code' => $code[$i],
                        'question_no' => $question[$i],
                        'correct_answer' => "No Answer",
                        'is_correct' => 0,
                        'date_submitted' => date("Y-m-d"),
                        'attempt' => 1
                    ]);
                    $answer->save();
                }
                else
                {   
                    if (str_contains($answers[$i], '_1')) { 
                        $checker = 1;
                    }
                    else
                    {
                        $checker = 0;
                    }

                    $answer = new answer([
                        'userid' =>  $applications->userid,
                        'applicationid' =>  $applications->application_id,
                        'question_code' => $code[$i],
                        'question_no' => $question[$i],
                        'correct_answer' => $answers[$i],
                        'is_correct' => $checker,
                        'date_submitted' => date("Y-m-d"),
                        'attempt' => 1
                    ]);
                    $answer->save();

                }

            }
            
            return back()->with('notes', "Exam submitted!");
         
    }



    //FOR SUBMIT REQUIREMENTS
    public function submitrequirments(Request $request) 
     {   
        if(session()->has('applicantsession'))
        {
            
           $reqname = $request->input('reqname');
           $reqcode = $request->input('reqcode');
           $useridreq = $request->input('useridreq');
           $usernamereq = $request->input('usernamereq');
           $appidreq = $request->input('appidreq');
           $name = $request->file('name');
           $applicationID = $request->input('applicationID');

           for ($i=0; $i<count($reqname); $i++){

                if(empty($name[$i]))
                {
                }
                else
                {
                    $pdf = $name[$i];
                    $fileName = date("M-d-Y").'-'.$usernamereq.'-'.$reqcode[$i].'.'. $pdf->extension();  
                    $pdf->move(public_path('/files/requirements'), $fileName);
                    $requirements = new requirements([
                            'userid' =>  $useridreq,
                            'application_id' =>  $applicationID,
                            'requirement_name' =>  $reqname[$i],
                            'file_code' => $reqcode[$i],
                            'is_posted' => 1,
                            'file_name' => $reqname[$i],
                            'file_url' => $fileName,
                            'remarks' => 'posted',
                            'date_submitted' => date("Y-m-d")
                    ]);
                    $requirements->save();
                }
                

            }


            return back()->with('notes', "Requirements submitted");

        }
        else
        {
            return back()->with('notes', "Please Login!");
        }

     }



    #allow user sent reply to message
    public function replymessage(Request $request) 
    {  
        if(session()->has('applicantsession'))
        {
            $this->validate($request, [
                'messagereply' => 'required',
            ]);

            $application_id = $request->input('application_id');
            $userid = $request->input('userid');
            $status = $request->input('status');
            $messagereply = $request->input('messagereply');
            $hr_userid = $request->input('hr_userid');

            $applicantreplies = new applicantreplies([
                'applicantID' => $userid,
                'applicationID' => $application_id,
                'applicationStatus' => $status,
                'message' => $messagereply,
                'messageTO' => $hr_userid,
                'datePosted' => NoW()
            ]);
            $applicantreplies->save();

            return back()->with('notes', "Posted.");
        }
        else
        {
            return back()->with('notes', "Please Login!");
        }
    } 



}
