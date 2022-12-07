<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\education;
use App\Models\applications;
use App\Models\family;
use App\Models\employment;
use App\Models\requirements;
use App\Models\resume;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class applicantprofile extends Controller
{
    //complete profile data
    public function completeprofileform(Request $request) 
    {
        if(session()->has('applicantsession')){

           // $province_id = $request->input('province');
            //$province_trim = trim($province_id,"id");
            //$province = DB::table('tbl_Province')->where('id', '=', $province_trim)->first();

            $house = $request->input('house');
            $blk = $request->input('blk');
            $street = $request->input('street');
            $unit = $request->input('unit');

            $complete_address = $house.' '.$blk.' '.$street.' '.$unit;


                 DB::table('tbl_profile')
                ->where('userid', '=', session('applicantsession'))
                ->update(
                    array(
                        'fname' => $request->input('fname'),
                        'lname' => $request->input('lname'),
                        'mname' => $request->input('mname'),
                        'suffix' => $request->input('suffix'),
                        'nickname' => $request->input('nickname'),
                        'gender' => $request->input('gender'),
                        'contact_number' => "+63".$request->input('contact_number'),
                        'complete_address' => $complete_address,
                        'province' => "Null",
                        'city' => "Null",
                        'brgy' => $request->input('brgy'),
                        'birthdate' => $request->input('birthdate'),
                        'birthplace' => $request->input('birthplace'),
                        'civilstatus' => $request->input('civilstatus'),
                        'citizenship' => $request->input('citizenship'),
                        'religion' => $request->input('religion'),
                        'mother_name' => $request->input('mother_name'),
                        'father_name' => $request->input('father_name'),
                        'spouse' => $request->input('spouse'),
                        'drivers_license' => $request->input('drivers_license'),
                        'restriction' => $request->input('restriction'),
                        'no_of_siblings' => $request->input('no_of_siblings'),
                        'sss' => $request->input('sss'),
                        'tin' => $request->input('tin'),
                        'philhealth' => $request->input('philhealth'),
                        'pagibig' => $request->input('pagibig'),
                    ));
            
              
                    
            $educational_level = $request->input('educational_level');
            $name_of_institution = $request->input('name_of_institution');
            $address = $request->input('address');
            $degree = $request->input('degree');
            $date_attended = $request->input('date_attended');

            if($educational_level == null)
            {

            }
            else
            {
                //check if already have educational background
                  $educationback = education::where('userid', '=', session('applicantsession'))->first();
                    if($educationback)
                    {
                        education::where('userid', '=', session('applicantsession'))->delete();

                        for($i=0;$i<count($educational_level);$i++){

                            $education = new education([
                                'userid' => session('applicantsession'),
                                'educational_level' => $educational_level[$i],
                                'name_of_institution' => $name_of_institution[$i],
                                'address' => $address[$i],
                                'degree' => $degree[$i],
                                'date_attended' => $date_attended[$i]
                            ]);
                            $education->save();
                        }
                    }
                    else
                    {   
                        for($i=0;$i<count($educational_level);$i++){

                            $education = new education([
                                'userid' => session('applicantsession'),
                                'educational_level' => $educational_level[$i],
                                'name_of_institution' => $name_of_institution[$i],
                                'address' => $address[$i],
                                'degree' => $degree[$i],
                                'date_attended' => $date_attended[$i]
                            ]);
                            $education->save();
                        }
                    }

            } 


            //FAMILY BACKGROUND
            $name = $request->input('name');
            $relationship = $request->input('relationship');
            $familybirthday = $request->input('familybirthday');
            $occupation = $request->input('occupation');
            $famcontact_number = $request->input('famcontact_number');
            $famaddress = $request->input('famaddress');

            if($name == null)
            {
    
            }
            else
            {
                    
                //check if already have FAMILY background
                $family = family::where('userid', '=', session('applicantsession'))->first();
                if($family)
                {   
                    family::where('userid', '=', session('applicantsession'))->delete();
                }
                else
                {
                   
                }

                for($i=0;$i<count($name);$i++){
                    $family = new family([
                        'userid' => session('applicantsession'),
                        'name' => $name[$i],
                        'relationship' => $relationship[$i],
                        'birthday' => $familybirthday[$i],
                        'occupation' => $occupation[$i],
                        'address' => $famaddress[$i],
                        'contact_number' => $famcontact_number[$i]
                    ]);
                    $family->save();
                }
                        
            }

            
            $company_employer = $request->input('company_employer');
            $job_title = $request->input('job_title');
            $company_address = $request->input('company_address');
            $date_employed = $request->input('date_employed');
            $length_of_stay = $request->input('length_of_stay');
            $employer_contact_number = $request->input('employer_contact_number');
            $starting_pay_rate = $request->input('starting_pay_rate');
            $ending_pay_rate = $request->input('ending_pay_rate');
            $separation_reason = $request->input('separation_reason');

         
    
            //check if already have employment data
            if($company_employer == null)
            {
    
            }
            else
            {
                $company_employercheck = employment::where('userid', '=', session('applicantsession'))->first();
                if($company_employercheck)
                {   
                    employment::where('userid', '=', session('applicantsession'))->delete();

                    for($i=0;$i<count($company_employer);$i++){
                        $employer = new employment([
                            'userid' => session('applicantsession'),
                            'employer' => $company_employer[$i],
                            'job_title' => $job_title[$i],
                            'address' => $company_address[$i],
                            'date_employed' => $date_employed[$i],
                            'length_of_stay' => $length_of_stay[$i],
                            'contact_number' => $employer_contact_number[$i],
                            'starting_pay_rate' => $starting_pay_rate[$i],
                            'ending_pay_rate' => $ending_pay_rate[$i],
                            'separation_reason' => $separation_reason[$i],
                        ]);
                        $employer->save();
                    }
                }
                else
                {
                    
                    for($i=0;$i<count($company_employer);$i++){
                        $employer = new employment([
                            'userid' => session('applicantsession'),
                            'employer' => $company_employer[$i],
                            'job_title' => $job_title[$i],
                            'address' => $company_address[$i],
                            'date_employed' => $date_employed[$i],
                            'length_of_stay' => $length_of_stay[$i],
                            'contact_number' => $employer_contact_number[$i],
                            'starting_pay_rate' => $starting_pay_rate[$i],
                            'ending_pay_rate' => $ending_pay_rate[$i],
                            'separation_reason' => $separation_reason[$i],
                        ]);
                        $employer->save();
                    }
                }
            }
                

            return back()->with('notes', "Form updated");    


        }
        else
        {
            return back()->with('checknotes', "Please Login!");
        }
    }

}
