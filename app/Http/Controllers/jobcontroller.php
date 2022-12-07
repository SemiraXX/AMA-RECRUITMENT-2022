<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class jobcontroller extends Controller
{
    //DISPLAY ALL JOB
    public function listofhirings() 
    {
        $allvacancies = DB::table('tbl_jobs')->orderBy('created_at', 'DESC')->limit(20)->get();
       
        return view('hiring.main',
            ['allvacancies' => $allvacancies]);  

    }

    //SEARCH JOB
    public function searchvacancies(Request $request) 
    {
        $wharejob = $request->input('wharejob');

        $allvacancies = DB::table('JDMaster')
        ->where('JDDescription', 'LIKE',  '%'.$wharejob.'%')
        ->orWhere('Summary', 'LIKE',  '%'.$wharejob.'%')
        ->limit(20)
        ->get();

        $var = $wharejob;
       
        return view('hiring.jobs',
            ['allvacancies' => $allvacancies,
            'var' => $var]);  

    }

    //DISPLAY SPECIFIC JOB DETAIL
    public function viewjobdetail(Request $request) 
    {   
        $id = $request->input('id');

        $jobdetails = DB::table('JDMaster')->where('JDCode', $id)->first();

        $qlfc = DB::table('JDQualifications')->where('JDCode', 'ACCT02')->first();
        $suggestions = DB::table('JDMaster')->orderBy('JDCode', 'DESC')->limit(5)->get();

        return view('hiring.viewhiring',
            ['jobdetails' => $jobdetails]);  

    }



    //FIND JOB IF LOGGEDIN
    public function findjobshere() 
    {
        if(session()->has('applicantsession'))
        {
            $allvacancies = DB::table('tbl_jobs')->orderBy('created_at', 'DESC')->limit(20)->get();
          
            return view('applicant.job',
                ['allvacancies' => $allvacancies]);  
        }
        else
        {
            return redirect()->route('loginpage');
        }

    }

    //SEARCH FUNCTION
    public function searchjobshere(Request $request) 
    {
        if(session()->has('applicantsession'))
        {
            
            $whatjob = $request->input('whatjob');
            $wharejob = $request->input('wharejob');

            $allvacancies = DB::table('JDMaster')
            ->where('JDDescription', 'LIKE',  '%'.$whatjob.'%')
            ->orWhere('Summary', 'LIKE',  '%'.$whatjob.'%')
            ->limit(20)
            ->get();
        
           
            return view('applicant.job',
                ['allvacancies' => $allvacancies]);  
        }
        else
        {
            return redirect()->route('loginpage');
        }

    }

    public function ajaxforjob(Request $request){

        $id = $request->input('id');

        $specificjd = DB::table('JDMaster')->where('JDCode', $id)->first();
        
        if(($specificjd->JDDescription == null) || ($specificjd->JDDescription == " ") || (empty($specificjd->JDDescription)))
        {
            $JDDescription = "...";
        }
        else
        {
            $JDDescription = $specificjd->JDDescription;
        }

        
        //if($specificjd)
        //{
            $training = DB::table('JDQualifications')->where('QlfType', 'Trng')->where('JDCode', $specificjd->JDCode)->first();
            if($training)
            {
                $trainingval = $training->QlfDesc;
            }
            else
            {
                $trainingval = "...";
            }
            
            $Skills = DB::table('JDQualifications')->where('QlfType', 'Skills')->where('JDCode', $specificjd->JDCode)->first();
            if($Skills)
            {
                $Skillsval = $Skills->QlfDesc;
            }
            else
            {
                $Skillsval = "...";
            }

            $duties = DB::table('JDDutiesResp')->where('JDCode', $specificjd->JDCode)->first();
            if($duties)
            {
                $dutiesval = $duties->DutiesResp;
            }
            else
            {
                $dutiesval = "...";
            }

            echo '
            <div class="insidejobtitle">
                <div class="row">
                <div class="col-sm-2">
                    <img src="/assets/ama-br-logo.png" class="job-logo">
                </div>
                <div class="col-sm-7">
                    <p class="main-job-title">'.$JDDescription.'</p>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                    <form action="/applicant/apply/form" method="get">
                    '.csrf_field().'
                    <input type="hidden" name="id" value="'.$id.'">
                    <button type="submit" class="apply-btn">Apply</button>
                    </form>
                    <a href="#"><button type="button" class="save-app-btn"><i class="fa fa-star" aria-hidden="true"></i></button></a>
                    </div>
                    
                </div>
                </div>
            </div>

            <div class="singlejobthumbnail">
            
                <p class="label-job-title">Job Details</p>

                <div class="job-details-wrapper">
                <p class="label-job-title1">Job Type:</p>
                <p class="job-label2">Full-time</p>
                <p class="job-label2">Permanent</p>
                <br>
                <p class="label-job-title1">Training Required:</p>
                <p class="job-label2">'.$trainingval.'</p>
                <br>
                <p class="label-job-title1">Skills Required:</p>
                <p class="job-label2">'.$Skillsval.'</p>
                <br>
                <p class="label-job-title1">Duties & Reponsibilities:</p>
                <p class="job-label2">'.$dutiesval.'</p>
                <br>
                <p class="label-job-title1">Full job Descriptions:</p>
                <p class="job-summary-label">'.$specificjd->Summary.'</p>
                <br>
                </div>
            <br><br><br>
            </div>
        ';
       
        //}
        //else
        //{
        //    echo "JDCode not exist in KP database";
        //}


    }




    
}
