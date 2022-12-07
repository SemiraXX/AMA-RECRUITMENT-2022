<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use App\Models\resignedrecord;
use App\Models\nonacad;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;


class deptheadcontroller extends Controller
{
    


    //AJAX manage resigned employee
    public function manageresigned(Request $request){

        $id = $request->input('id');
        $branch = $request->input('branch');
        $resigned = DB::connection('sqlsrv3')->select("SELECT * FROM Payroll.dbo.ResignationForms where SqncNo ='$id' and Branch ='$branch'");
        $checkifapproved = DB::connection('sqlsrv2')->select("SELECT * FROM DocTrax.dbo.ForApproval WHERE TranNo ='$id' and TranType='Rsgn' and FinalAction = 1");

        if($checkifapproved)
        {
            foreach($resigned as $detail)
            {
                echo '
                <h1 class="modal-title-info-p-text">'.$detail->RequestedBy.'</h1>
                <p class="info-label-main">Position:</p>
                <p class="info-label-1">'.$detail->EmpPos.'</p>
                <p class="info-label-main">Transation No:</p>
                <p class="info-label-1">'.$detail->SqncNo.'</p>
                <p class="info-label-main">Branch Code:</p>
                <p class="info-label-1">'.$detail->Branch.'</p>
                <p class="info-label-main">Letter:</p>
                <p class="info-label-1">'.$detail->ResignationLetter.'</p>
                <br>
                <br><br>
                ';
            }
        }
        else
        {
            echo '
                <h1 class="info-status-label">Cant find data</h1>
                <br>
                ';
        }
            
        
        
    }






    //AJAX manage resigned employee
    public function filenonacad(Request $request){

        $id = $request->input('id');
        $branch = $request->input('branch');

        //resigned employee details
        $detail = DB::connection('sqlsrv3')->table('ResignationForms')
        ->where('SqncNo', $id)
        ->where('Branch', $branch)
        ->first();

        $branchname = DB::table('tbl_BranchMaster')->where('BranchCode', $branch)->first();

        $getemployee = DB::connection('sqlsrv3')->table('EmpMaster')->where('UserId', $detail->EmpNo)->first();
        
        //get jd detals
        if($getemployee)
        {
            $jd = DB::table('JDMaster')->where('JDCode',  $getemployee->JDCode)->first();

            if($jd)
            {
              $myjd = DB::table('JDMaster')->where('JDCode', $getemployee->JDCode)->first();
            }
            else
            {
              $myjd = DB::table('JDMaster')->where('JDCode', 'ACCTP02')->first();
            }
          
        }
        else
        {
            $jd = DB::table('JDMaster')->where('JDCode', 'ACCTP02')->first();
            $myjd = DB::table('JDMaster')->where('JDCode', 'ACCTP02')->first();
        }


        
        $training = DB::table('JDQualifications')->where('QlfType', 'Trng')->where('JDCode', $myjd->JDCode)->first();

        if($training)
        {
          $mytraining = $training->QlfDesc;
        }
        else
        {
          $mytraining = "empty";
        }

        $Skills = DB::table('JDQualifications')->where('QlfType', 'Skills')->where('JDCode', $myjd->JDCode)->first();

        if($Skills)
        {
          $mySkills = $Skills->QlfDesc;
        }
        else
        {
          $mySkills = "empty";
        }


        if(!empty($myjd->RankCode))
        {
          $rank = $myjd->RankCode;
        }
        else
        {
          $rank = "empty";
        }
        

        $duties = DB::table('JDDutiesResp')->where('JDCode', $myjd->JDCode)->first();

        if($duties)
        {
          $myduties = $duties->DutiesResp;
        }
        else
        {
          $myduties = "Empty";
        }
        
        $department = $detail->Department;
        $getdeparments = DB::connection('sqlsrv4')->table('DeptProfile')
        ->where('BranchCode', $branch)
        ->where('DeptCode', $department)
        ->first();


        if($getdeparments){$department = $getdeparments->DeptCode;}else{$department="None";}

                echo '

                <div class="row">
                  <div class="col-sm-6">
                    <label class="form-label">Branch</label>
                    <input type="text" name="branch_name" id="name[]" class="appform-input" value="'.$branchname->BranchCode.'" readonly> 
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" id="name[]" class="appform-input" value="'.$department.'" readonly> 
                  </div>  
                </div> 

                <div class="row">
                  <div class="col-sm-4">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="name[]" class="appform-input" value="AMA" readonly> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Position</label>
                    <input type="text" name="position"  class="appform-input" value="'.$detail->EmpPos.'" required> 
                  </div>
                  <div class="col-sm-4">
                  <label class="form-label">Rank</label>
                  <input type="text" name="rank"  class="appform-input" value="'.$rank.'" required> 
                </div> 
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <label class="form-label">Justification for Request</label>
                    <textarea class="form-control" name="justification" rows="3" required></textarea>
                  </div>
                </div>

                <br>


                <div class="row">
                  <div class="col-sm-6">
                    <label class="form-label">Reason</label>
                    <input type="text" name="reason_of_request" class="appform-input" value="Replacement" readonly> 
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Employment type</label>
                    <select name="employment_type" class="appform-input" required>
                    <option value="CONSULTANT">CONSULTANT</option>
                    <option value="CONTRACTUAL">CONTRACTUAL</option>
                    <option value="FIXED-TERM">FIXED-TERM</option>
                    <option value="PROBATIONARY">PROBATIONARY</option>
                    <option value="PROJECT-BASED">PROJECT-BASED</option>
                    <option value="REGULAR">REGULAR</option>
                    </select>
                  </div>  
                  <div class="col-sm-4">
                    <label class="form-label">Date Needed</label>
                    <input type="date" name="date_needed"  class="appform-input" required> 
                  </div>  
                  <div class="col-sm-4">
                    <label class="form-label">Number of months</label>
                    <input type="number" name="no_of_months" class="appform-input" required> 
                  </div> 
                  <div class="col-sm-4">
                    <label class="form-label">No of employee</label>
                    <input type="number" name="no_of_employee_needed" class="appform-input" required> 
                  </div>  
                </div> 

                <br>

                <div class="row">
                  <div class="col-sm-6">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="appform-input" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                </div>
                  <div class="col-sm-6">
                    <label class="form-label">Age Range</label>
                    <select name="age_range" class="appform-input" required>
                        <option value="0-6 months">0-6 months</option>
                        <option value="1 year">1 year</option>
                        <option value="1-3 years">1-3 years</option>
                        <option value="3-5 years">3-5 years</option>
                        <option value="10 years & above">10 years & above</option>
                    </select>
                  </div>  
                </div> 

                <div class="row">
                  <div class="col-sm-6">
                        <label class="form-label">Work Experience</label>
                        <select name="work_experience" class="appform-input" required>
                        <option value="0-6 months">0-6 months</option>
                        <option value="1 year">1 year</option>
                        <option value="1-3 years">1-3 years</option>
                        <option value="3-5 years">3-5 years</option>
                        <option value="10 years & above">10 years & above</option>
                    </select>
                </div>
                  <div class="col-sm-6">
                    <label class="form-label">Educational Attainment:</label>
                    <select name="educational_attainment" class="appform-input" required>
                        <option value="College Graduate">College Graduate</option>
                        <option value="Doctoral Degree Holder">Doctoral Degree Holder</option>
                        <option value="HIGHSCHOOL GRADUATE">HIGHSCHOOL GRADUATE</option>
                        <option value="Masters Degree Holder">Masters Degree Holder</option>
                    </select>
                  </div>  
                </div> 
                
                <input type="hidden" name="branch_code" value="'.$branch.'"> 
                <input type="hidden" name="department_code" value="'.$department.'"> 
                <input type="hidden" name="resigned_employee_id" value="'.$detail->EmpNo.'"> 
                <input type="hidden" name="resigned_effectivity_date" value="'.$detail->EffectiveDateResign.'"> 
                <input type="hidden" name="training_required" value="'.$mytraining.'"> 
                <input type="hidden" name="special_skills" value="'.$mySkills.'"> 
                <input type="hidden" name="duties_and_responsibilities" value="'.$myduties.'"> 
                <input type="hidden" name="JDCode" value="'.$myjd->JDCode.'"> 
                <br><br>
                ';
            

    }



    //AJAX manage resigned employee
    public function viewfiledmrf(Request $request){

      $id = $request->input('id');

      $nonacad = nonacad::where('id', $id)->first();

      echo'
            <div class="row">
                  <div class="col-sm-6">
                    <label class="form-label">Branch</label>
                    <input type="text" name="branch_name"  class="appform-input" value="'.$nonacad->branch_name.'" readonly> 
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" class="appform-input" value="'.$nonacad->department.'" readonly> 
                  </div>  
            </div> 
            <div class="row">
                  <div class="col-sm-4">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="name[]" class="appform-input" value="'.$nonacad->company_name.'" readonly> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Position</label>
                    <input type="text" name="position"  class="appform-input" value="'.$nonacad->position.'" readonly> 
                  </div>
                  <div class="col-sm-4">
                  <label class="form-label">Rank</label>
                  <input type="text" name="rank"  class="appform-input" value="'.$nonacad->rank_level.'" readonly> 
                </div> 
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <label class="form-label">Justification for Request</label>
                    <textarea class="form-control" name="justification" rows="3" readonly>'.$nonacad->justification.'</textarea>
                  </div>
                </div>  

          <br>
          <div class="row">
          <div class="col-sm-6">
            <label class="form-label">Reason</label>
            <input type="text" name="reason_of_request" class="appform-input" value="'.$nonacad->reason_of_request.'" readonly> 
          </div>
          <div class="col-sm-6">
            <label class="form-label">Employment type</label>
            <input type="text" name="employment_type" class="appform-input" value="'.$nonacad->employment_type.'" readonly> 
          </div>  
          <div class="col-sm-4">
            <label class="form-label">Date Needed</label>
            <input type="date" name="date_needed"  class="appform-input" value="'.$nonacad->date_needed.'" readonly> 
          </div>  
          <div class="col-sm-4">
            <label class="form-label">Number of months</label>
            <input type="number" name="no_of_months" class="appform-input" value="'.$nonacad->no_of_months.'" readonly> 
          </div> 
          <div class="col-sm-4">
            <label class="form-label">No of employee</label>
            <input type="number" name="no_of_employee_needed" class="appform-input" value="'.$nonacad->no_of_employee_needed.'" readonly> 
          </div>  
        </div> 
        <br>
        <div class="row">
                  <div class="col-sm-6">
                        <label class="form-label">Gender</label>
                        <input type="text" name="gender" class="appform-input" value="'.$nonacad->gender.'" readonly> 
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Age Range</label>
                    <input type="text" name="age_range" class="appform-input" value="'.$nonacad->age_range.'" readonly> 
                  </div>  
                </div> 
        <br>
        <div class="row">
                  <div class="col-sm-6">
                        <label class="form-label">Work Experience</label>
                        <input type="text" name="work_experience" class="appform-input" value="'.$nonacad->work_experience.'" readonly> 
                </div>
                  <div class="col-sm-6">
                    <label class="form-label">Educational Attainment:</label>
                    <input type="text" name="educational_attainment" class="appform-input" value="'.$nonacad->educational_attainment.'" readonly> 
                  </div>  
                </div> 

          
      ';

    }
}
