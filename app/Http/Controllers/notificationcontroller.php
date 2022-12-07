<?php

namespace App\Http\Controllers;
use App\Models\applicants;
use App\Models\applications;
use App\Models\consent;
use App\Models\status;
use App\Models\answer;
use App\Models\requirements;
use App\Models\notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Session;


class notificationcontroller extends Controller
{
    //get notifications
    public function getnotifications(Request $request){

        if(session()->has('applicantsession')){

            $user = applicants::where('userid', '=', session('applicantsession'))->first();
            $notifications = notification::where('notif_for', '=', session('applicantsession'))
            ->where('if_viewed', '=', 0)
            ->orderBy('id', 'DESC')
            ->get();

            if($notifications)
            {
                echo'
                <table class="table">
                <tr><th class="notif-th">Notifications</th></tr>';
                foreach($notifications as $data)
                {
                    echo'<tr>
                    <td class="notif-td"> 
                        <i class="fa fa-circle notifmark" aria-hidden="true"></i>
                        <strong>'.$data->category.'</strong><br>
                        '.$data->action_remarks.'<br>
                        <span class="notif-date">'.$data->created_at.'</span>
                    </td>
                    </tr>';
                }
                echo'</table>';
            }
            else
            {
                echo'<h1>Empty</h1>';
            }

            $update = notification::where('notif_for', '=', session('applicantsession'))
            ->where('if_viewed', 0)
            ->orderBy('id', 'DESC')
            ->get();

            foreach($update as $get)
            {
                DB::table('tbl_notification_list')
                ->where('id', $get->id)
                ->update(
                    array(
                        'if_viewed' => 1
                     ));
    
            }


        }
        else
        {
            echo'<h1>Empty</h1>';
        }

    }
}
