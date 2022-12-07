<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicants extends Model
{
    use HasFactory;

    protected $table = 'tbl_profile';

    protected $fillable = [
        'userid',
        'isverified',
        'fname',
        'lname',
        'mname',
        'suffix',
        'nickname',
        'email',
        'password',
        'gender',
        'contact_number',
        'complete_address',
        'province',
        'city',
        'brgy',
        'status',
        'code',
        'birthdate',
        'birthplace',
        'civilstatus',
        'citizenship',
        'religion',
        'mother_name',
        'father_name',
        'spouse',
        'drivers_license',
        'restriction',
        'no_of_siblings',
        'sss',
        'tin',
        'philhealth',
        'pagibig',
        'login_count',
        'last_login'
    ];
}
