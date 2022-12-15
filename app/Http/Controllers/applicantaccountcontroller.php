<?php


namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\education;
use App\Models\applications;
use App\Models\family;
use App\Models\employment;
use App\Models\requirements;
use App\Models\resume;
use App\Models\uploadedresume;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class applicantaccountcontroller extends Controller
{

    //PROFILE
    public function applicantdashboard() 
    {
        if(session()->has('applicantsession')){

            $applicants = applicants::where('userid', '=', session('applicantsession'))->first();
            $citizenships = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'Citizen')->get();
            $civilstatuses = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'CivilStat')->get();
            $religious = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'Rel')->get();

            $educations = education::where('userid', '=', session('applicantsession'))->get();
            $families = family::where('userid', '=', session('applicantsession'))->get();
            $employment = employment::where('userid', '=', session('applicantsession'))->get();

            $requirements = requirements::where('userid', '=', session('applicantsession'))->Limit(4)->get();
            $allrequirements = requirements::where('userid', '=', session('applicantsession'))->get();
            $resume = resume::where('userid', '=', session('applicantsession'))->first();
            
            return view('applicant..profile.profile',
            ['applicants' => $applicants,
            'citizenships' => $citizenships,
            'civilstatuses' => $civilstatuses,
            'religious' => $religious,
            'educations' => $educations,
            'families' => $families,
            'employment' => $employment,
            'requirements' => $requirements,
            'resume' => $resume,
            'allrequirements' => $allrequirements]);    
        }
        else
        {
            return back()->with('checknotes', "Please Login!");
        }
    }

    //EDIT PROFILE
    public function editprofiledetails() 
    {
        if(session()->has('applicantsession')){

            $applicants = applicants::where('userid', '=', session('applicantsession'))->first();
            $citizenships = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'Citizen')->get();
            $civilstatuses = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'CivilStat')->get();
            $religious = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'Rel')->get();

            $educations = education::where('userid', '=', session('applicantsession'))->get();
            $families = family::where('userid', '=', session('applicantsession'))->get();
            $employment = employment::where('userid', '=', session('applicantsession'))->get();
            
            return view('applicant..profile.editprofile',
            ['applicants' => $applicants,
            'citizenships' => $citizenships,
            'civilstatuses' => $civilstatuses,
            'religious' => $religious,
            'educations' => $educations,
            'families' => $families,
            'employment' => $employment]);    
        }
        else
        {
            return back()->with('checknotes', "Please Login!");
        }
    }
    






    //COMPLETE PROFILE UPDATE DELETED*





    //delete educational attainment
    public function deleteeducattainmetn(Request $request) 
    {
        if(session()->has('applicantsession'))
        {   
            $id = $request->input('id');

            DB::table('tbl_educational_background')
            ->where('id', $id)
            ->delete();

            return back()->with('checknotes', "Form updated");  
        }
        else
        {
            return back()->with('notes', "Please Login!");
        }

    }


    //delete family background
    public function deletefamily(Request $request) 
    {
        if(session()->has('applicantsession'))
        {   
            $id = $request->input('id');

            DB::table('tbl_family')
            ->where('id', $id)
            ->delete();

            return back()->with('checknotes', "Form updated");  
        }
        else
        {
            return back()->with('notes', "Please Login!");
        }

    }



    //SUBMIT RESUME FILE
    public function submitresume(Request $request) 
    {
        if(session()->has('applicantsession')){
            
            $user = applicants::where('userid', '=', session('applicantsession'))->first();
            $resumecheck = resume::where('userid', '=', session('applicantsession'))->first();

            $pdf = $request->file('name'); 
            $fileName = date("M-d-Y").'-'.$user->lname.'-'.'RESUME'.'.'. $pdf->extension();  
            $pdf->move(public_path('/files/resume'), $fileName);
            
            if($resumecheck)
            {
                DB::table('tbl_resume_file')
                ->where('userid', '=', session('applicantsession'))
                ->update(
                    array(
                        'email' => $user->email,
                        'user_name' => $user->lname.' '.$user->fname,
                        'file_name' => "UPDATED RESUME",
                        'file' => $fileName,
                        'date_uploaded' => date("M-d-Y")
                    ));
            }
            else
            {    
                $resume = new resume([
                    'userid' => $user->userid,
                    'email' => $user->email,
                    'user_name' => $user->lname.' '.$user->fname,
                    'file_name' => "RESUME",
                    'file' => $fileName,
                    'date_uploaded' => date("M-d-Y")
                ]);
                $resume->save();

            }
            
    
            return back()->with('notes', "Resume posted");
           
        }
        else
        {
            return redirect()->route('signup'); 
        }
    }



    //SUBMIT RESUME FILE
    public function directsubmitresume(Request $request) 
    {
     
        $pdf = $request->file('name'); 
        $fileName = date("dMYHis").'-'.'RESUME'.'.'. $pdf->extension();  
        $pdf->move(public_path('/files/resume'), $fileName);
            
        $uploadedresume = new uploadedresume([
            'userid' => "Default",
            'applicationID' => 0,
            'file_name' => "RESUME THRU DIRECT UPLOAD",
            'file_url' => $fileName,
            'tagName' => "Direct upload to resume",
            'remarks' => "None",
            'date_submitted' => NOW()
        ]);
        $uploadedresume->save();

        
        return back()->with('notes', "Resume posted");
       
    }




}
