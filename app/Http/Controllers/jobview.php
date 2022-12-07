<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\nonacad;
use App\Models\jobs;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class jobview extends Controller
{
    //view job
    public function ajaxjobview(Request $request) 
    { 
        $id = $request->input('id');
        $jobposting = nonacad::where('id', $id)->first();

        echo
        '
        <h1 class="mrf-title-text">'.$jobposting->position.'</h1>
        <br>
        <div class="row">
            <div class="col-sm-4">
                <label class="form-label">Job Description Code</label>
                <input type="text" name="JDCode"  class="appform-input" value="'.$jobposting->JDCode.'" readonly> 
            </div>
            <div class="col-sm-4">
                <label class="form-label">Branch</label>
                <input type="text" name="branch_name"  class="appform-input" value="'.$jobposting->branch_name.'" readonly> 
            </div>
            <div class="col-sm-4">
                <label class="form-label">Department</label>
                <input type="text" name="department" class="appform-input" value="'.$jobposting->department.'" readonly> 
            </div>  
        </div> 
        <div class="row">
                  <div class="col-sm-4">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="company_name" id="name[]" class="appform-input" value="'.$jobposting->company_name.'" readonly> 
                  </div>
                  <div class="col-sm-4">
                    <label class="form-label">Position</label>
                    <input type="text" name="position"  class="appform-input" value="'.$jobposting->position.'" readonly> 
                  </div>
                  <div class="col-sm-4">
                  <label class="form-label">Rank</label>
                  <input type="text" name="rank"  class="appform-input" value="'.$jobposting->rank_level.'" readonly> 
                </div> 
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-12">
                    <label class="form-label">Justification for Request</label>
                    <textarea class="form-control" name="justification" rows="3" readonly>'.$jobposting->justification.'</textarea>
                  </div>
                </div>  

          <br>
          <div class="row">
          <div class="col-sm-6">
            <label class="form-label">Reason</label>
            <input type="text" name="reason_of_request" class="appform-input" value="'.$jobposting->reason_of_request.'" readonly> 
          </div>
          <div class="col-sm-6">
            <label class="form-label">Employment type</label>
            <input type="text" name="employment_type" class="appform-input" value="'.$jobposting->employment_type.'" readonly> 
          </div>  
          <div class="col-sm-4">
            <label class="form-label">Date Needed</label>
            <input type="date" name="date_needed"  class="appform-input" value="'.$jobposting->date_needed.'" readonly> 
          </div>  
          <div class="col-sm-4">
            <label class="form-label">Number of months</label>
            <input type="number" name="no_of_months" class="appform-input" value="'.$jobposting->no_of_months.'" readonly> 
          </div> 
          <div class="col-sm-4">
            <label class="form-label">No of employee</label>
            <input type="number" name="no_of_employee_needed" class="appform-input" value="'.$jobposting->no_of_employee_needed.'" readonly> 
          </div>  
        </div> 
        <br>
        <div class="row">
                  <div class="col-sm-6">
                        <label class="form-label">Gender</label>
                        <input type="text" name="gender" class="appform-input" value="'.$jobposting->gender.'" readonly> 
                  </div>
                  <div class="col-sm-6">
                    <label class="form-label">Age Range</label>
                    <input type="text" name="age_range" class="appform-input" value="'.$jobposting->age_range.'" readonly> 
                  </div>  
                </div> 
        <br>
        <div class="row">
                  <div class="col-sm-6">
                        <label class="form-label">Work Experience</label>
                        <input type="text" name="work_experience" class="appform-input" value="'.$jobposting->work_experience.'" readonly> 
                </div>
                  <div class="col-sm-6">
                    <label class="form-label">Educational Attainment:</label>
                    <input type="text" name="educational_attainment" class="appform-input" value="'.$jobposting->educational_attainment.'" readonly> 
                  </div>  
                </div> 
        ';
    }

    public function ajaxcreatejob(Request $request) 
    { 
        $id = $request->input('id');
        $mrfdetails = nonacad::where('mrf_id', $id)->first();

        #get jobdescription
        $getjobdescription = DB::table('JDMaster')->where('JDCode', $mrfdetails->JDCode)->first();

        if($getjobdescription)
        {
            $JobDescription = $getjobdescription->Summary;

            $training = DB::table('JDQualifications')->where('QlfType', 'Trng')->where('JDCode', $mrfdetails->JDCode)->first();
            if($training)
            {
                $trainingval = $training->QlfDesc;
            }
            else
            {
                $trainingval = "...";
            }
            
            $Skills = DB::table('JDQualifications')->where('QlfType', 'Skills')->where('JDCode', $mrfdetails->JDCode)->first();
            if($Skills)
            {
                $Skillsval = $Skills->QlfDesc;
            }
            else
            {
                $Skillsval = "...";
            }

            $duties = DB::table('JDDutiesResp')->where('JDCode', $mrfdetails->JDCode)->first();
            if($duties)
            {
                $dutiesval = $duties->DutiesResp;
            }
            else
            {
                $dutiesval = "...";
            }
            
        }
        else
        {
            $JobDescription = "JDCode not exist in KP database";
        }

        echo
        '
        <div class="row">
            <div class="col-sm-3">
                <label class="form-label" style="text-align:center !important">MRF ID</label><br><br>
                <label class="form-label" style="text-align:center !important">MRF Type</label><br><br>
                <label class="form-label" style="text-align:center !important">Branch Code</label><br><br>
                <label class="form-label" style="text-align:center !important">Employment Type</label><br><br>
                <label class="form-label" style="text-align:center !important">Education Attainment</label><br><br>
                <label class="form-label" style="text-align:center !important">Job Description</label><br><br>
                <label class="form-label" style="text-align:center !important">Position</label><br><br>
            </div>
            <div class="col-sm-9">
                <input type="text" name="mrf_id"  class="appform-input" value="'.$mrfdetails->mrf_id.'" required> 
                <input type="text" name="NonAcad"  class="appform-input" value="NonAcad" readonly> 
                <input type="text" name="branch_code"  class="appform-input" value="'.$mrfdetails->branch_code.'" required> 
                <input type="text" name="employment_type"  class="appform-input" value="'.$mrfdetails->employment_type.'" required>
                <input type="text" name="education_attainment"  class="appform-input" value="'.$mrfdetails->educational_attainment.'" required> 
                <textarea class="appform-input" name="JobDescription" rows="3" required>'.$JobDescription.'</textarea>
                <input type="text" name="position"  class="appform-input" value="'.$mrfdetails->position.'" required> 
                <input type="hidden" name="branch_name" value="'.$mrfdetails->branch_name.'" required>
                <input type="hidden" name="JDCode" value="'.$mrfdetails->JDCode.'" required>
            </div>
        </div> 
        <hr>
        <label class="form-label" style="text-align:center !important">Qualifications Base on JDCODE</label><br><br>

        <p class="form-label">Required Training</p>
        <ul>
            <li class="modal-li">'.$trainingval.'</li>
        </ul>
        <p class="form-label">Required Skills</p>
        <ul>
            <li class="modal-li">'.$Skillsval.'</li>
        </ul>
        <p class="form-label">Duties & Responsibilities</p>
        <ul>
            <li class="modal-li">'.$dutiesval.'</li>
        </ul>
        <br><br>
        ';
    }


    public function postnewjob(Request $request) 
    {


        $jobs = new jobs([
            'post_id' => uniqid(),
            'mrf_id' => $request->input('mrf_id'),
            'mrf_type' => 0,
            'company_id' => 0,
            'company_name' => "AMA",
            'branch_code' => $request->input('branch_code'),
            'branch_name' => $request->input('branch_name'),
            'employment_type' => $request->input('employment_type'),
            'education_attainment' => $request->input('education_attainment'),
            'JDCode' => $request->input('JDCode'),
            'JobDescription' => $request->input('JobDescription'),
            'position' => $request->input('position'),
            'date_posted' => NOW(),
            'date_closed' => 0,
            'expiration' => 0,
            'views' => 0,
            'saves' => 0,
            'posted_by' => "HR"
        ]);
        $jobs->save();

        return back()->with('notes', "Job is successfully posted");

    }
}
