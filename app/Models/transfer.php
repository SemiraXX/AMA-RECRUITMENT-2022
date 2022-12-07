<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transfer extends Model
{
    use HasFactory;

    protected $table = 'tbl_for_e201_transferring';

    protected $fillable = [
        'application_id',
        'applicant_id',
        'applicant_email',
        'applicant_lname',
        'applicant_fname',
        'mrf_id',
        'date_transferred',
        'who_transferred',
        'status',
        'other_remarks'
    ];
}
