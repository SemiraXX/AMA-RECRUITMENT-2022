<?php

namespace App\Http\Controllers;
use App\Models\privacy;
use Illuminate\Http\Request;

class consentcontroller extends Controller
{
    public function uploaduserip(Request $request) 
    {
        $privacy = new privacy([
            'if_agreed' => 1,
            'ip_address' => $request->ip(),
            'date_posted' => NOW()
        ]);
        $privacy->save();

        return back();
    }
}
