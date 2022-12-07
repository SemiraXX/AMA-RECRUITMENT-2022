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

class deptheadapplicationscontroller extends Controller
{
     //get applications
     public function getsecondinterviewapplications(Request $request) 
     {
         $allapplications = applications::where('status', 'For-Second-Interview')
         ->orderBy('id', 'DESC')
         ->get();
              
         return view('depthead.applications',
         ['allapplications' => $allapplications]);   
     }






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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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
                    'level_count'  => 2,
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



    
}
