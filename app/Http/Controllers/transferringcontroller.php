<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\transfer;
use App\Models\education;
use App\Models\employment;
use App\Models\requirements;
use App\Models\nonacad;
use App\Models\empmaster;
use App\Models\doxfiles;
use App\Models\emprecord;
use App\Models\EmpUploadFile;
use App\Models\FileAttachementTemp;
use App\Models\userprofilekp;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class transferringcontroller extends Controller
{
    //get for e201
    public function displayfortransferring(Request $request) 
    {
        $allapplications = applications::where('status', 'For-Onboarding')->orderBy('date_applied', 'DESC')->get();

        return view('hr.e201',
        ['allapplications' => $allapplications]);   
    }



    //AJAX 
    public function transfertoe201page(Request $request){

        $id = $request->input('id');
        $applicants = applications::where('id', $id)->first();

        echo '
        <div class="modal-question-content">
        <p class="c-question">Transfer to 201</p>
        <br>
        <p class="c-content-1">You are about to transfer <span class="c-highlight">'.$applicants->lname.' '.$applicants->fname.'</span> with application id <span class="c-highlight">'.$applicants->application_id.'</span> and applying for <span class="c-highlight">'.$applicants->position_applying.'</span> to E201 list. </p>
        </div>

        <input type="hidden" name="application_id" value="'.$applicants->application_id.'">
        <input type="hidden" name="id" value="'.$applicants->id.'">
        ';
    }


    //ADD 
    public function addtolist(Request $request){

        $id = $request->input('id');
        $application_id = $request->input('application_id');

        $applicants = applications::where('id', $id)->where('application_id', $application_id)->first();

        if($applicants)
        {
      
            $transfer = new transfer([
                'application_id' => $applicants->application_id,
                'applicant_id' => $applicants->userid,
                'applicant_email'=> $applicants->email,
                'applicant_lname' => $applicants->lname,
                'applicant_fname' => $applicants->fname,
                'mrf_id' => $applicants->mrf_number,
                'date_transferred' => NOW(),
                'who_transferred' => "Not-yet",
                'status' => "None",
                'other_remarks' => "None"
            ]);
            $transfer->save();

            return back()->with('notes', "Successfully transferred to E201 list. Check E201 panel.");
        }
        else
        {
            return back()->with('checknotes', "Application not found.");
        }


    }


    //transfer 
    public function e201form(Request $request){

        $id = $request->input('id');
        $application_id = $request->input('application_id');
        $applicants = applications::where('id', $id)->orWhere('application_id', $application_id)->first();
        $educations = education::where('userid', $applicants->userid)->get();
        $employment = employment::where('userid', $applicants->userid)->get();
        $requirements = requirements::where('userid', $applicants->userid)->get();

        $timekeeping = DB::connection('sqlsrv3')->table('Mst_timekeeping')->get();
        $ranks = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'Rank')->get();

        //create if acad or non-acad
        $matrix = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'basicpymtrx')->get();
        $submatrix = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'basicpymtrxsub')->get();
        $PayType = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'PayType')->get();
        $Currency = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'Currency')->get();
        $PayoutMode = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'PayoutMode')->get();
        $CompType = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'CompType')->get();
        $CompBenGrp = DB::connection('sqlsrv3')->table('vw_References')->where('KeyGroup', 'CompBenGrp')->get();


        //$nonacad = nonacad::where('userid', $applicants->userid)->get();
        if($applicants)
        {
            return view('hr.e201form',
            ['applicants' => $applicants,'educations' => $educations,'employment' => $employment ,'requirements' => $requirements,
            'timekeeping' => $timekeeping,'ranks' => $ranks,'matrix' => $matrix, 'submatrix' => $submatrix,
            'PayType' => $PayType, 'Currency' => $Currency, 'PayoutMode' => $PayoutMode, 'CompType' => $CompType, 'CompBenGrp' => $CompBenGrp
            ]);   
        }
        else
        {
            return back()->with('checknotes', "Application not found.");
        }

    }



    //transfer 
    public function transfertokp(Request $request){

        $id = $request->input('id');
        $application_id = $request->input('application_id');
        $applicants = applications::where('id', $id)->first();

        //get mrf details
        #note connect application to mrf form
        $fromMRF = nonacad::where('mrf_id', '8084308072022')->first();
        
        if($applicants)
        {
         
            $empmaster = new empmaster([
                'InfoNo' => $request->input('employee_id'),
                'UserID' => $request->input('employee_id'),
                'LastName' => 'TEST'.$applicants->lname,
                'FirstName'=> $applicants->fname,
                'MiddleName'=> $applicants->mname,
                'SuffixName'=> $applicants->suffix,
                'AkaName'=> $applicants->nickname,
                'Gender'=> null,
                'Birthdate'=> null,
                'BirthPlace'=> $applicants->birth_place,
                'CivilStatus'=> $applicants->civil_status,
                'Citizenship'=> $applicants->citizenship,
                'Religion'=> $applicants->religion,
                'Branchcode'=> $request->input('Branchcode'),
                'DeptCode'=> $request->input('DeptCode'),
                'JDCode' => $fromMRF->JDCode,
                'TerminationReason'=> null,
                'EmploymentStatus'=> "ACTIVE",
                'EmpType'=> 0,
                'ApplicantNo'=> null,
                'BlackListReason'=> null,
                'ParentID'=> null,
                'TaggedAs' => null,
            ]);
            $empmaster->save();



            #get all uploaded files for specific application
            $requirements = requirements::where('application_id', '79515-2022-09-06')->get();

            #get array value/requirements 
            foreach($requirements as $file)
            {
                //Employee uploaded files
                $EmpUploadFile = new EmpUploadFile([
                    'InfoNo' => $request->input('employee_id'),
                    'UploadType' => $file->file_code,
                    'UploadDesc' => $file->requirement_name,
                    'UploadFileName' => $file->file_url,
                    'FileDirectory' => "https://recruitment.amaes.com/files/requirements/".$file->file_url,
                    'DateUploaded' => $file->date_submitted,
                    'AuditDate' => null,
                    'AuditBy' => null,
                    'AuditRemarks' => null,
                    'UploadedBy' => null
                ]);
                $EmpUploadFile->save();


                //file attachements
                $FileAttachementTemp = new FileAttachementTemp([
                    'SystemSource' => "Recruiment",
                    'TranNo' => $applicants->application_id,
                    'TranType' => "E201",
                    'FileFullPath' => $file->file_url,
                    'FileCode'  => $file->file_code,
                    'DateCreated' => NOW(),
                    'Remarks' => "None",
                    'BranchCode' =>  $fromMRF->branch_code,
                    'FilePriority' => 0,
                    'ApplicationId' => $applicants->application_id,
                    'ApplicationFileName' => $file->requirement_name,
                    'ApplicationFilePath' => "https://recruitment.amaes.com/files/requirements/".$file->file_url
                ]);
                $FileAttachementTemp->save();

            }


            #add new data to Userprofile KP/aCCOUNT 
            $userprofilekp = new userprofilekp([
                'UserID' => $request->input('employee_id'),
                'UserName' => $applicants->lname.' '.$applicants->fname,
                'UserApp' => 'RegUser',
                'Password' => 'pHfLPBHwz8O/zH+dm1Y6vA==',
                'ResetPassword' => 1,
                'Monitored' => 1,
                'UserEmail' => $applicants->userid,
                'BranchCode' => $request->input('Branchcode'),
                //'ValidDaysStart' 
                //'ValidDaysEnd'
                //'ValidDateStart'
                //'ValidDateExpire'
                //'LastUpdateBy'
                //'LastUpdateDate'
                'DeptCode' => $request->input('DeptCode'),
                'Position' => $fromMRF->position,
                //'IsApprover' => 
                'Rank' => $fromMRF->rank
                //'TOUrgent'
                //'OBExpired'
                //s'PermanentOB'
            ]);
            $userprofilekp->save();


            

            //FOR EMPRECORD
            $emprecord = new emprecord([
                'InfoNo' => '999999999',
                'UserID' => $request->input('employee_id'),
                'EmpStatus' => $request->input('EmpStatus'),
                'EmpStartDate' => $request->input('EmpStatus'),
                'EmpResign' => $fromMRF->resigned_employee_id,
                'EmpTitle' => $request->input('EmpTitle'),
                'EmpPositionCode'  => $request->input('EmpTitle'),
                'EmpRankCode' => null,
                'EmpTitle_Designate' => null,
                'EmpPositionCode_Designate' => $fromMRF->JDCode,
                'EmpRankCode_Designate' => $request->input('EmpRankCode'),
                'DesignateStartDate' => $fromMRF->date_needed,
                'DesignateEndDate'=> NOw(),
                'PayrollTag'=> 0,
                'PaySchedCode'=> 'null',
                'TimeKeepingCode'=> 'null',
                'No_Overtime'=> 0,
                'No_ChangeDayOff'=> 0,
                'MaxHoursLabel'=> 0,
                'MaxHoursValue'=> 0,
                'EmpPositionLevel'=> 1,
                'EmpPositionLevel_Designate',
                'EmpRankLevel' => $request->input('EmpRankLevel'),
                'EmpRankLevel_Designate'=> 1,
                'BasicPaySchemeType'=> 2,
                'CompBenScheme'=> null,
                'HrsRequired'=> $request->input('HrsRequired'),
                /*'BankName'=> null,
                'BankAcctNo'=> null,
                'TaxShieldPercentage'=> null,
                'MaxHoursOverloadValue'=> null,
                'MaxHoursOverloadLabel'=> null,
                'IncludePayroll'=> null,
                'EndOfContract'=> null,
                'SecondaryBankName'=> null,
                'SecondaryBankAcctNo'=> null,
                'PayrollHoldDate'=> null,
                'HoldPercentage'=> null,*/
                'ReHireDate'=> NOw(),
                'RetrenchedDate'=> NOw(),
                'RetrenchedStatus'=> NOw()
            ]);
            $emprecord->save();



            //FOR FILE ATTACHEMENTS
            /*$doxfiles = new doxfiles([
                'SystemSource' => "Recruiment",
                'TranNo' => $applicants->application_id,
                'TranType' => "Applications File",
                'FileFullPath' => "Sample file 1",
                'FileCode'  => "File 1",
                'DateCreated' => NOW(),
                'Remarks' => "none",
                'ImgData' => 0,
                'BranchCode' => 0,
                'FilePriority' => 0,
                'AuditUser' => 0,
                'AuditDate'=> 0,
                'AuditRemarks' => 0,
                'ApplicationId' => $applicants->application_id,
                'ApplicationFileName' => "Applications File",
                'ApplicationFilePath' => "https://recruitment.amaes.com/files/requirements/Nov-10-2022-Belmonte-PRCLICENSE.pdf"
            ]);
            $doxfiles->save();*/


            return back()->with('notes', "Successfully transferred to E201.");
        }
        else
        {
            return back()->with('checknotes', "Application not found.");
        }

        
    }


}
