<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use App\Models\evaluation;
use App\Models\evaluationoverall;
use App\Models\education;
use App\Models\employment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class evaluationcontroller extends Controller
{
    
    //save evaluation
    public function saveevaluation(Request $request){

        $get_app_id = $request->input('get_app_id');
        $candidate = $request->input('candidate');
        $interviewer = $request->input('interviewer');
        $dateinterviewed = $request->input('dateinterviewed');

        //get application details
        $applications = applications::where('application_id', $get_app_id)->first();

        //if application found
        if($applications)
        {

            $personality_cat = $request->input('personality_cat');
            $personality_eval = $request->input('personality_eval');
            $personality_remark = $request->input('personality_remark');

            $cs_cat = $request->input('cs_cat');
            $cs_eval = $request->input('cs_eval');
            $cs_remarks = $request->input('cs_remarks');

            $pa_cat = $request->input('pa_cat');
            $pa_eval = $request->input('pa_eval');
            $pa_remarks = $request->input('pa_remarks');

            $ao_cat = $request->input('ao_cat');
            $ao_eval = $request->input('ao_eval');
            $ao_remarks = $request->input('ao_remarks');


            $lm_cat = $request->input('lm_cat');
            $lm_eval = $request->input('lm_eval');
            $lm_remarks = $request->input('lm_remarks');

            $rm_cat = $request->input('rm_cat');
            $rm_eval = $request->input('rm_eval');
            $rm_remarks = $request->input('rm_remarks');


            $jf_cat = $request->input('jf_cat');
            $jf_eval = $request->input('jf_eval');
            $jf_remarks = $request->input('jf_remarks');



            //personality_cat
            $check_personality_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'PERSONALITY')->where('application_id', $applications->application_id)->first();
            if($check_personality_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'PERSONALITY')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $personality_eval,
                        'evaluation_remarks' => $personality_remark,
                    ));
            }
            else
            {
                $evaluation = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $personality_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $personality_eval,
                    'evaluation_remarks' => $personality_remark,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation->save();
            }




            //cs_cat
            $check_cs_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'COMMUNICATION SKILLS')->where('application_id', $applications->application_id)->first();
            if($check_cs_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'COMMUNICATION SKILLS')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $cs_eval,
                        'evaluation_remarks' => $cs_remarks,
                    ));
            }
            else
            {
                $evaluation1 = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $cs_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $cs_eval,
                    'evaluation_remarks' => $cs_remarks,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation1->save();
            }

            
            //pa_cat
            $check_pa_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'ANALYTICAL SKILLS/PROBLEM ASSESSMENT')->where('application_id', $applications->application_id)->first();
            if($check_pa_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'ANALYTICAL SKILLS/PROBLEM ASSESSMENT')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $pa_eval,
                        'evaluation_remarks' => $pa_remarks,
                    ));
            }
            else
            {
                $evaluation2 = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $pa_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $pa_eval,
                    'evaluation_remarks' => $pa_remarks,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation2->save();
            }


            //ao_cat
            $check_ao_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'ACHIEVEMENT ORIENTATION')->where('application_id', $applications->application_id)->first();
            if($check_ao_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'ACHIEVEMENT ORIENTATION')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $ao_eval,
                        'evaluation_remarks' => $ao_remarks,
                    ));
            }
            else
            {
                $evaluation3 = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $ao_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $ao_eval,
                    'evaluation_remarks' => $ao_remarks,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation3->save();
            }




            //lm_cat
            $check_lm_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'LEADERSHIP/MANAGEMENT')->where('application_id', $applications->application_id)->first();
            if($check_lm_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'LEADERSHIP/MANAGEMENT')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $lm_eval,
                        'evaluation_remarks' => $lm_remarks,
                    ));
            }
            else
            {
                $evaluation6 = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $lm_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $lm_eval,
                    'evaluation_remarks' => $lm_remarks,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation6->save();
            }





            //rm_cat
            $check_rm_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'RELATIONSHIP MANAGEMENT')->where('application_id', $applications->application_id)->first();
            if($check_rm_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'RELATIONSHIP MANAGEMENT')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $rm_eval,
                        'evaluation_remarks' => $rm_remarks,
                    ));
            }
            else
            {
                $evaluation4 = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $rm_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $rm_eval,
                    'evaluation_remarks' => $rm_remarks,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation4->save();
            }



            //jf_cat
            $check_jf_cat = evaluation::where('level_count', 1)->where('evaluation_category', 'JOB FIT')->where('application_id', $applications->application_id)->first();
            if($check_jf_cat)
            {
                DB::table('tbl_evaluations')
                ->where('evaluation_category', 'JOB FIT')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'evaluation_score' =>  $jf_eval,
                        'evaluation_remarks' => $jf_remarks,
                    ));
            }
            else
            {
                $evaluation5 = new evaluation([
                    'userid' =>  $applications->userid,
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'evaluation_category' =>  $jf_cat,
                    'evaluation_date' =>  NOW(),
                    'evaluation_score' =>  $jf_eval,
                    'evaluation_remarks' => $jf_remarks,
                    'logged_by' => 0001,
                    'date_logged'  =>  NOW(), 
                ]);
                $evaluation5->save();
            }


            //to save overall evaluation
            $strengths = $request->input('strengths');
            $weaknesses = $request->input('weaknesses');
            $hiring_decision = $request->input('hiring_decision');
            $is_recommended = $request->input('is_recommended');

            $total_points = $jf_eval + $rm_eval + $lm_eval + $ao_eval + $pa_eval + $cs_eval + $personality_eval;
            
            $evaluationoverall = evaluationoverall::where('level_count', 1)->where('application_id', $applications->application_id)->first();
            
            if($evaluationoverall)
            {
                DB::table('tbl_overall_evaluation')
                ->where('application_id', $applications->application_id)
                ->update(
                    array(
                        'interviewer' =>  $interviewer,
                        'date_interviewed' =>  $dateinterviewed,
                        'strengths' => $strengths,
                        'weaknesses' => $weaknesses,
                        'hiring_decision' => $hiring_decision,
                        'is_recommended' => $is_recommended,
                        'total_points' => $total_points,
                    ));
            }
            else
            {
                $overall = new evaluationoverall([
                    'level_count'  => 1,
                    'application_id' =>  $applications->application_id,
                    'userid' =>  $applications->userid,
                    'candidate' =>  $candidate,
                    'interviewer' =>  $interviewer,
                    'interviewer_id' =>  0001,
                    'date_interviewed' =>  $dateinterviewed,
                    'position' =>  $applications->position_applying,
                    'strengths' => $strengths,
                    'weaknesses' => $weaknesses,
                    'hiring_decision' => $hiring_decision,
                    'is_recommended' => $is_recommended,
                    'total_points' => $total_points,
                ]);
                $overall->save();
            }


            return back()->with('checknotes', "Posted");

        }
        else
        {
            return back()->with('checknotes', "Application not found");
        }
    }












    //THIS IS FOR CRITERIA EVALUATION
    public function getapplicantforevaluation(Request $request){

        $id = $request->input('id');
        $applicants = applications::where('id', $id)->first();

        
        $answers = answer::where('applicationid', $applicants->application_id)->get();
        $exams = DB::table('ExamMaster')->orderBy('SetCode', 'ASC')->get();
        $sum = answer::where('applicationid', $applicants->application_id)->get()->sum('is_correct');
        $requirements = requirements::where('application_id', $applicants->application_id)->get();

        $education = education::where('userid', $applicants->userid)->first();
        $employment = employment::where('userid', $applicants->userid)->first();
        $examresults = answer::where('applicationid', $applicants->application_id)->get()->sum('is_correct');
        $interview = evaluationoverall::where('application_id', $applicants->application_id)->first();


        $bar100 = '<div id="myProgress"><div class="progress-bar progress-bar-danger" id="progbar100">100%</div></div>';
        $bar80 = '<div id="myProgress"><div class="progress-bar progress-bar-danger" id="progbar80">80%</div></div>';
        $bar60 = '<div id="myProgress"><div class="progress-bar progress-bar-danger" id="progbar60">60%</div></div>';
        $bar40 = '<div id="myProgress"><div class="progress-bar progress-bar-danger" id="progbar40">40%</div></div>';
        $bar0 = '<div id="myProgress"><div class="progress-bar progress-bar-danger" id="progbar0">0%</div></div>';
        


        //CONDITION FOR WORK EXP (SUPERVISOR)
        if($employment->length_of_stay == null)
        {
            $emply_points = 0;
            $employmenbar = $bar0;
        }
        else if($employment->length_of_stay >= 4)
        {
            $emply_points = 25;
            $employmenbar =  $bar100;
        }
        else if($employment->length_of_stay == 3)
        {
            $emply_points = 20;
            $employmenbar = $bar80;
        }
        else if($employment->length_of_stay == 2)
        {
            $emply_points = 15;
            $employmenbar = $bar60;
        }
        else if($employment->length_of_stay == 1)
        {
            $emply_points = 10;
            $employmenbar = $bar40;
        }
        else
        {
            $emply_points = 0;
            $employmenbar = $bar0;
        }



        //CONDITION FOR PROF LICENSE (ALL RANK)
        if($applicants->professional_license != "None")
        {
            $prof_lcns_points = 5;
            $prof_lcnsbar =  $bar100;
        }
        else
        {
            $prof_lcns_points = 0;
            $prof_lcnsbar =  $bar0;
        }



        //CONDITION FOR AWARDS (SUPERVISOR)
        if($applicants->latin_awards_honors != "None")
        {
            $honors_points = 4;
            $honorsbar =  $bar100;
        }
        else
        {
            $honors_points = 0;
            $honorsbar =  $bar0;
        }

        

        //CONDITION FOR INTERVIEW RESULTS (SUPERVISOR)
        if($interview->total_points >= 60)
        {
            $interview_points = 25;
            $interviewbar = 
            '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar100">25</div>
            </div>
            ';
        }
        else
        {
            $interview_points = 5;
            $interviewbar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar60">5</div>
            </div>
            ';
        }


        //CONDITION FOR EXAMRESULTS (SUPERVISOR)
        if($examresults >= 60)
        {
            $exam_points = 10;
            $exambar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar60">10</div>
            </div>
            ';
        }
        else if(($examresults > 44) && ($examresults < 60))
        {
            $exam_points = 10;
            $exambar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar40">10</div>
            </div>
            ';
        }
        else if(($examresults > 36) && ($examresults < 45))
        {
            $exam_points = 10;
            $exambar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar40">10</div>
            </div>
            ';
        }
        else if($examresults < 29)
        {
            $exam_points = 10;
            $exambar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar40">10</div>
            </div>
            ';
        }
        else
        {
            $exam_points = 0;
            $exambar = 
            '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar40">0</div>
            </div>
            ';
        }





        //CONDITION FOR EDUCATION (SUPERVISOR)
        if(($education->educational_level == "College Graduate") || 
        ($education->educational_level == "Bachelor"))
        {
            $educ_points = 15;
            $educbar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar100">15</div>
            </div>
            ';
        }
        else
        {
            $educ_points = 0;

            $educbar = 
              '
            <div id="myProgress">
                <div class="progress-bar progress-bar-danger" id="progbar0">0%</div>
            </div>
            ';

        }


        
        echo '



        
        <div class="fileinfo">
        <p class="hr-dashboard-title">CRITERIA FOR HIRING</p>

            <table class="table">
            <tr>
                <th>Factors</th>
                <th>Details</th>
                <th class="table_points">Points</th>
                <th class="table_points">Base</th>
                <th style="width:30%">Points percentage</th>
            </tr>
            <tr>
                <td>Education</td>
                <td>'.$education->educational_level.'</td>
                <td class="table_points">'.$educ_points.'</td>
                <td class="table_points">00</td>
                <td>'.$educbar.'</td>
            </tr>
            <tr>
                <td>Work Experience</td>
                <td>'.$employment->employer.' '.$employment->length_of_stay.' sdasd</td>
                <td class="table_points">'.$emply_points.'</td>
                <td class="table_points">00</td>
                <td>'.$employmenbar.'</td>
            </tr>
            <tr>
                <td>Exam Result</td>
                <td>'.$examresults.' points</td>
                <td class="table_points">'.$exam_points.'</td>
                <td class="table_points">00</td>
                <td>'.$exambar.'</td>
            </tr>
            <tr>
                <td>First Interview Result</td>
                <td>'.$interview->total_points.' points</td>   
                <td class="table_points">'.$interview_points.'</td>
                <td class="table_points">00</td>
                <td>'.$interviewbar.'</td>
            </tr>
            <tr>
                <td>Professional License</td>
                <td>'.$applicants->professional_license.'</td>   
                <td class="table_points">'.$prof_lcns_points.'</td>
                <td class="table_points">5</td>
                <td>'.$prof_lcnsbar.'</td>
            </tr>
            <tr>
                <td>Awards/Honors</td>
                <td>'.$applicants->latin_awards_honors.'</td>   
                <td class="table_points">'.$honors_points.'</td>
                <td class="table_points">5</td>
                <td>'.$honorsbar.'</td>
            </tr>

            </table>

            <br>
            <p class="hr-dashboard-title">Modify Status</p>
                  <div class="row">
                    <div class="col-sm-6">
                    <p class="info-label-main">Applying for:</p>
                    <p class="info-label-1">'.$applicants->position_applying.'</p>
                    <p class="info-label-main">Applicant Info:</p>
                    <p class="info-label-1">Name: '.$applicants->lname.', '.$applicants->fname.'</p>
                    <p class="info-label-1">Email: '.$applicants->email.'</p>
                    <p class="profile-modal-info">Address: '.$applicants->present_address.'</p>
                    </div>
                    <div class="col-sm-6"> 

                        <select name="application_status" class="appform-input" required>
                        <option value="For-Initial-Interview">For-Initial-Interview</option>
                        <option value="For-Exam-and-Essay">For-Exam-and-Essay</option>
                        <option value="For-Criteria-Evaluation">For-Criteria-Evaluation</option>
                        <option value="For-Second-Interview">For-Second-Interview</option>
                        <option value="For-Final-Interview">For-Final-Interview</option>
                        <option value="For-Final-Decision-of-Management">For-Final-Decision-of-Management</option>
                        <option value="For-Job-Offer">For-Job-Offer</option>
                        <option value="For-Pre-Employment-Requirements">For-Pre-Employment-Requirements</option>
                        <option value="For-Onboarding">For-Onboarding</option>
                        </select>
    
                        <br>
                        <p class="info-label-1">Exam Code</p>
                        <select name="examcode" class="appform-input">
                        <option value="Not-set">Not-set</option>
                        ';
                        foreach($exams as $exam){
                        echo '<option value="'.$exam->SetCode.'">'.$exam->SetCode.'</option>';
                        }
                       
                        echo '</select>
                        <p class="info-label-1">Interviewer</p>
                        <select name="interviewer" class="appform-input">
                        <option value="Not-set">Not-set</option>
                        <option value="interviewer1">interviewer1</option>
                        <option value="interviewer2">interviewer2</option>
                        </select>
                        <br>
                        <p class="info-label-1">Message</p>
                        <textarea class="appform-input" style="height: auto;" rows="5" name="message"></textarea>
    
                    
                        <button type="submit" class="manageapplicants-btn">Proceed</button><br><br>
                    </div>
                  </div>
    
            <input type="hidden" name="application_id" value="'.$applicants->application_id.'">
        </div>





        <div class="firstinfo">
            <p class="hr-dashboard-title">Job Applying</p>
            <div class="row">
                <div class="col-sm-3">
                    <p class="profile-modal-info">POSITION</p><hr>
                    <p class="profile-modal-info">DESIRED SALARY</p><hr>
                </div>
                <div class="col-sm-9">
                    <p class="profile-modal-info">'.$applicants->position_applying.'</p><hr>
                    <p class="profile-modal-info">₱'.$applicants->desired_salary.'</p><hr>
                </div>
            </div>
            <br>
            <p class="hr-dashboard-title">Applicants Info</p>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <p class="profile-modal-info">NAME</p><hr>
                    <p class="profile-modal-info">EMAIL</p><hr>
                    <p class="profile-modal-info">GENDER</p><hr>
                    <p class="profile-modal-info">CONTACT INFO</p><hr>
                    <p class="profile-modal-info">ADDRESS</p><hr>
                </div>
                <div class="col-sm-9">
                    <p class="profile-modal-info" >'.$applicants->lname.', '.$applicants->fname.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->email.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->gender.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->contact_no.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->present_address.'</p><hr>
                </div>
            </div>
            <br>
            <p class="hr-dashboard-title">Supporting Credentials</p>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <p class="profile-modal-info">AWARDS/HONORS</p><hr>
                    <p class="profile-modal-info">LICENSE</p><hr>
                    <p class="profile-modal-info">CERTIFICATION</p><hr>
                </div>
                <div class="col-sm-9">
                    <p class="profile-modal-info">'.$applicants->latin_awards_honors.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->professional_license.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->tesda_cerfitification.'</p><hr>
                </div>
            </div>
        </div>


        <div class="applicantfiles">
            <div class="container">
            <h1 class="info-status-label">Document Files</h1>
            <br>
            <div class="row">';
            foreach($requirements as $file){
            echo '
            <div class="col-sm-2" style="text-align:center;padding:15px">
            <a href="/files/requirements/'.$file->file_url.'" target="_blank" style="text-decoration:none">
            <h1 class="document-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></h1>
            <p class="document-name">'.$file->file_url.'</p>
            </a>
            </div>
            ';
            }
            echo'
            </div>
            </div>
        </div>

        
        ';

    }

}
