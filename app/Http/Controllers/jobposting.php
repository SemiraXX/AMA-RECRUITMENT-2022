<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\nonacad;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;

class jobposting extends Controller
{
     //get shortlisted
     public function displayjobsposting(Request $request) 
     {
        
         $forpostings = nonacad::where('mrf_status', 'Approved')
         ->orderBy('id', 'DESC')
         ->get();
              
         return view('hr.jobs',
         ['forpostings' => $forpostings]);
     }
}
