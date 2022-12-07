<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use App\Models\notification;
use App\Models\adminhrapplicationtrail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class hrapplicationscontroller extends Controller
{


    //update application status
    public function updateapplicationstatus(Request $request){


        #check first if has adminlogged session
        if(session()->has('hradminsessionid'))
        {

            $application_id = $request->input('application_id');
            $remarks = $request->input('remarks');
            $comments = $request->input('comments');
        
            $applicant = applications::where('application_id', $application_id)->first();
        
                DB::table('tbl_applications')
                    ->where('application_id', $application_id)
                    ->update(
                        array(
                            'status' => $request->input('application_status')
                        ));
        
                $status = new status([
                    'application_id' => $application_id,
                    'userid' => $applicant->userid,
                    'mrf_number' => $applicant->mrf_number,
                    'complete_name' => $applicant->lname.", ".$applicant->fname,
                    'status' => $request->input('application_status'),
                    'position' => $applicant->position_applying,
                    'branch' => "None",
                    'interviewer' => $request->input('interviewer'),
                    'exam' => $request->input('examcode'),
                    'max_attempt' => 2,
                    'attempt' => 0,
                    'active' => 1,
                    'for_transfer' => 0,
                    'hr_userid' => 00001,
                    'message' => $request->input('message'),
                    'remarks' => "New",
                    'data_modified' => NOW()   
                ]);
                $status->save();


                #save trail to HR recent activities
                $adminhrapplicationtrail = new adminhrapplicationtrail([
                    'hrID' => '01043127',
                    'username' => '01043127',
                    'modulename' => 'Applications',
                    'applicantID' => $applicant->userid,
                    'applicationID' => $application_id,
                    'currentstatus' => $request->input('application_status'),
                    'actiontaken' => 'Changed application ('.$application_id.') status to ('. $request->input('application_status').") with (Exam: ".$request->input('examcode').") & (Interviewer: ".$request->input('interviewer').")",
                    'remarks' => $remarks,
                    'othercomment' => $comments,
                    'datelogged' => NOW(),
                    'ipaddress' => $request->ip(),
                    'httpbrowser' => $request->userAgent()
                ]);
                $adminhrapplicationtrail->save();


                //FOR NOTIFICATIONS
                $notification = new notification([
                    'notif_id' => uniqid(),
                    'notif_for' => $applicant->userid,
                    'category' => "Application (".$application_id.")",
                    'action_remarks' => "Your application status is changed to '".$request->input('application_status')."'",
                    'other_content' => "None",
                    'who_viewed' => "None",
                    'if_viewed' => 0,
                    'date_viewed' => 0
                ]);
                $notification->save();

        
            return back()->with('notes', "Successful");

        }
        else
        {
            return back()->with('checknotes', "Try to login first");
        }
            
    }
}
