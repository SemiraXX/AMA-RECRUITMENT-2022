<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use App\Models\nonacad;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class mrfcontroller extends Controller
{

     //display all filed mrf
     public function listoffilednonacad(Request $request) 
     {   
        $nonacad = nonacad::all();
 
         return view('depthead.mrf',
         ['nonacad' => $nonacad]);
         
     }

     public function exec(Request $request) 
     {   
        
        //DB::select('exec TestUsingLaravel(pFirstName,pLastName)',array('May','Belmonte'));

        //DB::select('call TestUsingLaravel(Michael, Jopia)');

        //return DB::select('call TestUsingLaravel("Michael", "Jopia")');

        //$exec = DB::select('call TestUsingLaravel2("FirstName", "LastName")');
        //$pGeneratedTranID = 93830108072022;
        //$pBranchCode = "PC02";
        //$exec = DB::connection("sqlsrv")->statement("exec RecruitmentSaveMrfNonAcad '$pGeneratedTranID', '$pBranchCode'");
        //$mrf_id = '09876';
        //$branchcode = 'samplebranch';

        //$exec = DB::statement("exec RecruitmentSaveMrfNonAcad '$pGeneratedTranID', '$pBranchCode'");
        //$exec = DB::statement("exec RecruitmentSaveMrfNonAcad '$pGeneratedTranID', '$pBranchCode'");
        //$exec = DB::statement("exec RecruitmentSaveMrfNonAcad '$mrf_id', '$branchcode'");

        //$Action =  3;
        //$exec = DB::statement("exec sp_SaveEmployeeProfile '$Action'");

        //RecruitmentSaveMrfNonAcad @pGeneratedTranID,@pBranchCode
        //DB::select('call TestUsingLaravel("FirstName", "LastName")');
        
        //DB::select('call TestUsingLaravel("FirstName", "LastName")');
        //DB::select('exec TestUsingLaravel("FirstName", "LastName")');
        //DB::select('CALL TestUsingLaravel()');
        //DB::select('exec TestUsingLaravel(FirstName,LastName)',array('May','Belmonte'));
        
        /*$branchcode = "sample";
        $mrf_id = rand(0, 999999).date("mdY");
        $exec = DB::statement("exec RecruitmentSaveMrfNonAcad '$mrf_id', '$branchcode'");*/
        $ServerName = 'http://localhost:8080/jasperserver';
        $Parameters = 'pUserID|01234567';
        $param3 = 'E201Report';

        $scalar = DB::connection('sqlsrv3')->select("SELECT dbo.GenerateReport ($param3, $ServerName, $Parameters)");
        
        $pm1 = 'Payroll';
        $UserBranch = 'AMASample';
        $UpdatedBy = 'sample1';
        $InfoNo = '12345678';
        $TranType = 'OB';
        $Remarks = 'sampleremarks';

        $mrf_id = '324234';
        $branchcode = 'AMA';

        //$execsaveattachements = DB::connection('sqlsrv3')->statement("exec spu_AttachementSave 'Payroll', '$UserBranch', '$UpdatedBy', 0, '$InfoNo', '$TranType', 'E201 Report', 'E201Report', '$Remarks', '$scalar', 'Temp','0'");
        //$exec = DB::statement("exec RecruitmentSaveMrfNonAcad '$mrf_id', '$branchcode'");
        print_r($scalar);

        //print_r($execsaveattachements);
     }




    //upload NON-ACAD MRF
    public function submitNONACAD(Request $request) 
    {
        $branchcode = $request->input('branch_code');
        $mrf_id = rand(0, 999999).date("mdY");


        $nonacad = new nonacad([
            'dept_head_id' => 0001,
            'mrf_id' => $mrf_id,
            'mrf_status' => "Approved",
            'rev_date' => date("M-d-Y"),
            'branch_code' =>  $branchcode,
            'branch_name' => $request->input('branch_name'),
            'position' => $request->input('position'),
            'rank' => $request->input('rank'),
            'rank_level' => 0,
            'department' => $request->input('department'),
            'department_code' => $request->input('department_code'),
            'company_name' => $request->input('company_name'),
            'employment_type' => $request->input('employment_type'),
            'reason_of_request' => $request->input('reason_of_request'),
            'justification' => $request->input('justification'),
            'gender' => $request->input('gender'),
            'age_range' => $request->input('age_range'),
            'educational_attainment' => $request->input('educational_attainment'),
            'work_experience' => $request->input('work_experience'),
            'training_required' => $request->input('training_required'),
            'special_skills' =>  $request->input('special_skills'),
            'duties_and_responsibilities' => "none",
            'supporting_documents' => "empty",
            'no_of_employee_needed' => $request->input('no_of_employee_needed'),
            'date_needed' => $request->input('date_needed'),
            'no_of_months' => $request->input('no_of_months'), 
            'resigned_employee_id' => $request->input('resigned_employee_id'),
            'resigned_employee_position' => $request->input('position'),
            'resigned_effectivity_date' => $request->input('resigned_effectivity_date'),
            'JDCode' => $request->input('JDCode'),
            'date_filed' => date("M-d-Y")
        ]);
        $nonacad->save();

        $exec = DB::statement("exec RecruitmentSaveMrfNonAcad '$mrf_id', '$branchcode'");

        return back()->with('notes', "MRF NON-ACAD posted");
    }


    //view mrf request
    
}
