<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applications extends Model
{
    use HasFactory;
    protected $table = 'tbl_applications';

    protected $fillable = [
        'status',
        'application_id',
        'userid',
        'date_applied',
        'mrf_type',
        'mrf_number',
        'lname',
        'fname',
        'mname',
        'suffix',
        'nickname',
        'email',
        'gender',
        'contact_no',
        'present_address',
        'province',
        'city',
        'birth_place',
        'civil_status',
        'citizenship',
        'religion',
        'employment_status',
        'driving_license_type',
        'restriction',
        'other_license',
        'no_of_siblings',
        'no_of_children',
        'spouse',
        'mother_name',
        'father_name',
        'sss',
        'tin',
        'philhealth',
        'pagibig',
        'professional_license',
        'employed',
        'previouly_employed',
        'related_to_ama_employee',
        'been_dismissed',
        'involved_in_criminal_case',
        'position_applying',
        'desired_salary',
        'latin_awards_honors',
        'tesda_cerfitification',
        'when_hear_about_us'
    ];
}
