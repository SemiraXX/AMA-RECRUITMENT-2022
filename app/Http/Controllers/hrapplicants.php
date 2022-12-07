<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class hrapplicants extends Controller
{
    
    
    //EDIT APPLICANT STATUS
    public function userapply(Request $request) 
    {
        if(session()->has('applicantsession')){

        }
        else
        {
            return back()->with('notes', "Please Login!");
        }
    }





    //AJAX view applicant
    public function getapplicationdata(Request $request){

        $id = $request->input('id');
        $applicants = applications::where('id', $id)->first();
        
        echo '
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


        <div class="secondinfo">
            <p class="hr-dashboard-title">Other Details</p>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <p class="profile-modal-info">BIRTH PLACE</p><hr>
                    <p class="profile-modal-info">CIVIL</p><hr>
                    <p class="profile-modal-info">CITIZENSHIP</p><hr>
                    <p class="profile-modal-info">RELIGION</p><hr>
                    <p class="profile-modal-info">EMPLOYMENT</p><hr>
                    <p class="profile-modal-info">DRIVING LICENSE</p><hr>

                    <p class="profile-modal-info">OTHER LICENSE</p><hr>
                    <p class="profile-modal-info">NO. SINLINGS</p><hr>
                    <p class="profile-modal-info">CHILDREN</p><hr>
                    <p class="profile-modal-info">SPOUSE</p><hr>
                    <p class="profile-modal-info">MOTHER NAME</p><hr>
                    <p class="profile-modal-info">FATHER NAME</p><hr>
                </div>
                <div class="col-sm-9">
                    <p class="profile-modal-info">'.$applicants->birth_place.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->civil_status.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->citizenship.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->religion.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->employment_status.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->driving_license_type.'</p><hr>

                    <p class="profile-modal-info">'.$applicants->other_license.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->no_of_siblings.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->no_of_children.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->spouse.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->mother_name.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->father_name.'</p><hr>
                </div>
            </div>

             
            <br>
            <p class="hr-dashboard-title">Goverment Credetials</p>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <p class="profile-modal-info">SSS</p><hr>
                    <p class="profile-modal-info">TIN</p><hr>
                    <p class="profile-modal-info">PHILHEALTH</p><hr>
                    <p class="profile-modal-info">PAG-IBIG</p><hr>
                </div>
                <div class="col-sm-9">
                    <p class="profile-modal-info">'.$applicants->sss.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->tin.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->philhealth.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->pagibig.'</p><hr>
                </div>
            </div>

            <br>
            <br>
            <p class="hr-dashboard-title">AMA QUERY</p>
            <br>
            <div class="row">
                <div class="col-sm-5">
                    <p class="profile-modal-info">EMPLOYED?</p><hr>
                    <p class="profile-modal-info">PREVIOUSLY EMPLOYED?</p><hr>
                </div>
                <div class="col-sm-7">
                    <p class="profile-modal-info">'.$applicants->sss.'</p><hr>
                    <p class="profile-modal-info">'.$applicants->tin.'</p><hr>
                </div>
            </div>
            <BR>
            <div class="row">
                <div class="col-sm-12">
                    <p class="profile-modal-info">RELATED TO AMA EMPLOYEE?</p>
                    <p class="profile-modal-info">'.$applicants->related_to_ama_employee.'</p><hr>

                    <p class="profile-modal-info">HAVE YOU EVER BEEN DISMISSED?</p>
                    <p class="profile-modal-info">'.$applicants->been_dismissed.'</p><hr>

                    <p class="profile-modal-info">BEEN INVOLVED IN CRIMINAL CASE?</p>
                    <p class="profile-modal-info">'.$applicants->involved_in_criminal_case.'</p><hr>
                </div>
            </div>


        </div>
        ';

    }






    //manage application content to retrive via AJax
    public function manageapplicant(Request $request){

        $id = $request->input('id');
        $applicants = applications::where('id', $id)->first();

        $activities = DB::table('tbl_hr_applications_movement_trail')
        ->where('applicationID', $applicants->application_id)
        ->orderBy('datelogged', 'DESC')
        ->get(); 

        $exams = DB::table('ExamMaster')->orderBy('SetCode', 'ASC')->get();

        echo '
            <div class="recentactivities">
                <h1 class="modify-status-label">Recent Activities</h1>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Date Logged</th>
                      <th scope="col">Content</th>
                    </tr>
                  </thead>
                  <tbody>';
                    if($activities)
                    {
                      foreach($activities as $activity)
                      {
                      echo'
                      <tr>
                        <th>'.$activity->datelogged.'</th>
                        <td style="font-size:14px">
                          <strong>Admin ID:</strong> HR #'.$activity->hrID.'
                          <br>
                          <strong>Action Taken:</strong> '.$activity->actiontaken.'
                          <br>
                          <strong>Remarks:</strong> '.$activity->remarks.'
                          <br>
                          <strong>Other comments:</strong> '.$activity->othercomment.'
                        </td>
                      </tr>';
                      }
                    }
                    else
                    {

                    }
                    echo'
                  </tbody>
                </table>
            </div>

            <div class="row managemain">
                <div class="col-sm-6">
                    <h1 class="info-status-label">'.$applicants->status.'</h1>
                    <br>
                    <p class="info-label-main">Applying for:</p>
                    <p class="info-label-1">'.$applicants->position_applying.'</p>
                    <p class="info-label-main">Applicant Info:</p>
                    <p class="info-label-1">Name: '.$applicants->lname.', '.$applicants->fname.'</p>
                    <p class="info-label-1">Email: '.$applicants->email.'</p>
                    <p class="profile-modal-info">Address: '.$applicants->present_address.'</p>
                    <p class="info-label-main">Others:</p>
                    <p class="profile-modal-info">License: '.$applicants->professional_license.'</p>
                    <p class="profile-modal-info">Previouly employed: '.$applicants->previouly_employed.'</p>
                    <p class="profile-modal-info">Related to AMA employee: '.$applicants->related_to_ama_employee.'</p>
                    <p class="profile-modal-info">Has criminal record? : '.$applicants->involved_in_criminal_case.'</p>
            
                    <input type="hidden" name="application_id" value="'.$applicants->application_id.'">
                </div>
                <div class="col-sm-6"> 
                <br>
                    <h1 class="modify-status-label">Modify Status</h1>
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
                    <option value="For-Onboarding">Declined</option>
                    </select>
                    <br>
                    <p class="info-label-1">Exam Code</p>
                    <select name="examcode" class="appform-input">
                    <option value="Not-set">Not-set</option>';
                    foreach($exams as $exam)
                    {
                    echo '
                    <option value="{{$exam->SetCode}}">{{$exam->SetCode}}</option>
                    ';
                    }
                    echo'
                    </select>
                    <p class="info-label-1">Interviewer</p>
                    <select name="interviewer" class="appform-input">
                    <option value="Not-set">Not-set</option>
                    <option value="interviewer1">interviewer1</option>
                    <option value="interviewer2">interviewer2</option>
                    </select>
                    <br>
                    <p class="info-label-1">Message</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" name="message"></textarea>
                    <hr>
                    <p class="info-label-1">HR Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" name="remarks" required></textarea>
                    <p class="info-label-1">HR other comments</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" name="comments" required></textarea>

                
                    <button type="submit" class="manageapplicants-btn">Proceed</button>
                </div>
            </div>
        ';
    }
    




    public function manageapplicantforprocessing(Request $request){

        $id = $request->input('id');
        $applicants = applications::where('id', $id)->first();
        $answers = answer::where('applicationid', $applicants->application_id)->get();

        $exams = DB::table('ExamMaster')->orderBy('SetCode', 'ASC')->get();
        $sum = answer::where('applicationid', $applicants->application_id)->get()->sum('is_correct');

        $requirements = requirements::where('application_id', $applicants->application_id)->get();

        $activities = DB::table('tbl_hr_applications_movement_trail')
        ->where('applicationID', $applicants->application_id)
        ->orderBy('datelogged', 'DESC')
        ->get(); 

        $replies = DB::table('tbl_applicants_reply')
        ->where('applicationID', $applicants->application_id)
        ->orderBy('datePosted', 'ASC')->get();

        echo '


            <div class="recentactivities">
                <h1 class="modify-status-label">Recent Activities</h1>
                <br>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Date Logged</th>
                      <th scope="col">HR/Admin</th>
                      <th scope="col">Content</th>
                      <th scope="col">Remarks</th>
                      <th scope="col">Other Comments</th>
                    </tr>
                  </thead>
                  <tbody>';
                    if($activities)
                    {
                      foreach($activities as $activity)
                      {
                      echo'
                      <tr>
                        <th>'.$activity->datelogged.'</th>
                        <td style="font-size:14px">
                          <span style="color:#0EBB4A">'.$activity->hrID.'</span>
                        </td>
                        <td style="font-size:14px">
                          <strong>Action Taken:</strong> '.$activity->actiontaken.'
                        </td>
                        <td style="font-size:14px">
                          '.$activity->remarks.'
                        </td>
                        <td style="font-size:14px">
                          '.$activity->othercomment.'
                        </td>
                      </tr>';
                      }
                    }
                    else
                    {

                    }
                    echo'
                  </tbody>
                </table>
            </div>

        <div class="applicantfiles">
            <div class="container">
            <h1 class="info-status-label">Document Files</h1>
            <br>
            <div class="row">';
            foreach($requirements as $file){
            echo '
            <div class="col-sm-3" style="text-align:center;padding:15px">
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

        <div class="messageswrapper">'; 
            if($replies)
                {
                    echo'
                    <p class="info-label-main">Messages:</p>
                    ';
                    foreach($replies as $reply)
                    {
                    echo'
                    <div class="message-reply-wrapper">  
                    <p class="reply-content-text"><i class="fa fa-user" aria-hidden="true"></i>: '.$reply->message.'
                    <br> <strong class="progress-time-style">'.$reply->datePosted.'</strong></p>
                    </div>
                    ';
                    }
                }
                echo'
                
        </div>


        <div class="examresults">
        <h1 class="info-status-label">Exam Results</h1>
        <p class="info-label-main">Total Correct Answer: <strong>'.$sum.' / 63</strong></p>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Question</th>
            <th scope="col">Applicant Answer</th>
            <th scope="col">Check</th>
            <th scope="col">Point</th>
            <th scope="col">Date Submitted</th>
            </tr>
        </thead>
        <tbody>
        ';
            foreach($answers as $answer){
                
                $checkexam = DB::table('ExamDetails')->where('QuestionNo', $answer->question_no)->first();

                if($answer->is_correct == 1)
                {
                    echo '
                    <tr>
                    <th scope="row">'.$checkexam->Question.'</th>
                    <td>'.$answer->correct_answer.'</td>
                    <td class="checked"><i class="fa fa-check" aria-hidden="true"></i></td>
                    <td>'.$answer->is_correct.'</td>
                    <td>'.$answer->date_submitted.'</td>
                    </tr>
                    ';
                }
                else
                {
                    echo '
                    <tr>
                    <th scope="row">'.$checkexam->Question.'</th>
                    <td>'.$answer->correct_answer.'</td>
                    <td class="timescross"><i class="fa fa-times" aria-hidden="true"></i></td>
                    <td>'.$answer->is_correct.'</td>
                    <td>'.$answer->date_submitted.'</td>
                    </tr>
                    ';
                }
                    
            }

        echo '</tbody>
        </table>
        </div>



        <div class="managethiswrapper">
              <div class="row">
                <div class="col-sm-6">
                <h1 class="info-status-label">'.$applicants->status.'</h1>
                <br>
                <p class="info-label-main">Applying for:</p>
                <p class="info-label-1">'.$applicants->position_applying.'</p>
                <p class="info-label-main">Applicant Info:</p>
                <p class="info-label-1">Name: '.$applicants->lname.', '.$applicants->fname.'</p>
                <p class="info-label-1">Email: '.$applicants->email.'</p>
                <p class="profile-modal-info">Address: '.$applicants->present_address.'</p>
                <p class="info-label-main">Others:</p>
                <p class="profile-modal-info">License: '.$applicants->professional_license.'</p>
                <p class="profile-modal-info">Previouly employed: '.$applicants->previouly_employed.'</p>
                <p class="profile-modal-info">Related to AMA employee: '.$applicants->related_to_ama_employee.'</p>
                <p class="profile-modal-info">Has criminal record? : '.$applicants->involved_in_criminal_case.'</p>
                <hr>
                </div>
                <div class="col-sm-6"> 
                <br>
                    <h1 class="modify-status-label">Modify Status</h1>
                    
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
                    echo '<option value="'.$exam->SetCode.'">'.$exam->Description.'</option>';
                    }
                   
                    echo '</select>
                    <p class="info-label-1">Interviewer</p>
                    <select name="interviewer" class="appform-input">
                    <option value="Not-set">Not-set</option>
                    <option value="interviewer1">interviewer1</option>
                    <option value="interviewer2">interviewer2</option>
                    </select>
                    <br>
                    <p class="info-label-1">Message to applicant</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" name="message" required></textarea>
                    <hr>
                    <p class="info-label-1">HR Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" name="remarks" required></textarea>
                    <p class="info-label-1">HR other comments</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" name="comments" required></textarea>
                
                    <button type="submit" class="manageapplicants-btn">Proceed</button><br><br>
                </div>
              </div>
            </div>

        <input type="hidden" name="application_id" value="'.$applicants->application_id.'">
        


        <div class="evaluationwrapper" style="padding:30px">
            <h1 class="info-status-label">1st INTERVIEW EVALUATION FORM</h1>
            <div class="row">
                <div class="col-sm-6">
                    <p class="info-label-1">CANDIDATE:</p>
                    <input type="text" class="appform-input" id="candidate" value="'.$applicants->lname.', '.$applicants->fname.'" readonly>
                    <p class="info-label-1">INTERVIEWER:</p>
                    <input type="text" class="appform-input" id="interviewer" value="None">
                </div>
                <div class="col-sm-6">
                    <p class="info-label-1">DATE INTERVIEWED</p>
                    <input type="date" class="appform-input" id="dateinterviewed" placeholder="Enter Here">
                    <p class="info-label-1">POSITION OF INTERVIEWER:</p>
                    <input type="text" class="appform-input" id="position" placeholder="Enter Here">
                </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>PERSONALITY:</p>
                        <input type="hidden" id="personality_cat" value="PERSONALITY">
                        <ul>
                        <li>Is the candidate pleasant? Is he friendly?</li>
                        <li>Does the candidate dress appropriately?</li>
                        <li>Grooming, dress and personal habits should be evaluated from a clients point of view.</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="personality_eval" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="personality_remark" value="0"></textarea>
                    </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>COMMUNICATION SKILLS:</p>
                        <input type="hidden" id="cs_cat" value="COMMUNICATION SKILLS">
                        <ul>
                        <li>Does the candidate listen when you talk?</li>
                        <li>Does the candidate respond openly and warmly?</li>
                        <li>Does the candidate use appropriate grammar and vocabulary?</li>
                        <li>Does the candidate speak with confident tone of voice?</li>
                        <li>Is the candidates voice well modulated?</li>
                        <li>Does the candidate maintain an attentive posture?</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="cs_evals" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="cs_remarks" value="0"></textarea>
                    </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>ANALYTICAL SKILLS/PROBLEM ASSESSMENT:</p>
                        <input type="hidden" id="pa_cat" value="ANALYTICAL SKILLS/PROBLEM ASSESSMENT">
                        <ul>
                        <li>Does the candidate show insight when expressing ideas?</li>
                        <li>Do past decisions make sense relative to maturity and knowledge?</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="pa_eval" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="pa_remarks" value="0"></textarea>
                    </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>ACHIEVEMENT ORIENTATION:</p>
                        <input type="hidden" id="ao_cat" value="ACHIEVEMENT ORIENTATION">
                        <ul>
                        <li>Is the candidate result-oriented?</li>
                        <li>Does the candidate show creativity and innovation?</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="ao_eval" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="ao_remarks" value="0"></textarea>
                    </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>LEADERSHIP/MANAGEMENT:</p>
                        <input type="hidden" id="lm_cat" value="LEADERSHIP/MANAGEMENT">
                        <ul>
                        <li>Is the candidate good at planning and organizing?</li>
                        <li>Is he good in-group leadership and in developing people?</li>                        
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="lm_eval" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="lm_remarks" value="0"></textarea>
                    </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>RELATIONSHIP MANAGEMENT:</p>
                        <input type="hidden" id="rm_cat" value="RELATIONSHIP MANAGEMENT">
                        <ul>
                        <li>Does the candidate seek contacts or networks and pursue friendly relationships with people?</li>
                        <li>Does the candidate build rapport through formal or informal/casual contacts with people who may be valuable to the organization?</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="rm_eval" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="rm_remarks" value="0"></textarea>
                    </div>
            </div>
            <hr>
            <div class="row">
                    <div class="col-sm-6">
                        <p>JOB FIT:</p>
                        <input type="hidden" id="jf_cat" value="JOB FIT">
                        <ul>
                        <li>Is the candidate flexible and adaptable to changes?</li>
                        <li>Does the candidate show commitment/seem to stay long?</li>
                        </ul>
                    </div>

                    <div class="col-sm-6">
                    <p class="info-label-1">Evaluation (1-10)</p>
                    <input type="number" class="appform-input" id="jf_eval" placeholder="Enter Here" value="0">
                    <p class="info-label-1">Remarks</p>
                    <textarea class="appform-input" style="height: auto;" rows="5" id="jf_remarks" value="0"></textarea>
                    </div>
            </div>
            <br>
            <hr>
            <h1 class="info-status-label">OVERALL EVALUATION</h1>
            <br>
            
                <p class="info-label-1">What do you think are the candidates strengths?</p>
                <textarea class="appform-input" style="height: auto;" rows="3" id="strengths" value="0" placeholder="Type Here"></textarea>
                <br>
                <p class="info-label-1">What do  you think are the candidates weaknesses?</p>
                <textarea class="appform-input" style="height: auto;" rows="3" id="weaknesses" value="0" placeholder="Type Here"></textarea>
                <br>
                <p class="info-label-1">If you had to make hiring decision based on this interview, what would it be?</p>
                <textarea class="appform-input" style="height: auto;" rows="3" id="hiring_decision" value="0" placeholder="Type Here">YES</textarea>
                <br>
                <p class="info-label-1">What course of action would you recommend for this candidate?</p>
                <textarea class="appform-input" style="height: auto;" rows="3" id="is_recommended" value="0" placeholder="Type Here"></textarea>
                
            <br>
            <input type="hidden" id="get_app_id" value="'.$applicants->application_id.'">
    
            <button type="button" class="manageapplicants-btn save_evaluation">Save Evaluation</button>
            <br><br>
         
        </div>
        
        <br><br>
        ';
    }






}
