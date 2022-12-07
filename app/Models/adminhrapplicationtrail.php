<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminhrapplicationtrail extends Model
{
    use HasFactory;

    protected $table = 'tbl_hr_applications_movement_trail';

    protected $fillable = [
        'hrID',
        'username',
        'modulename',
        'applicantID',
        'applicationID',
        'currentstatus',
        'actiontaken',
        'remarks',
        'othercomment',
        'datelogged',
        'ipaddress',
        'httpbrowser'
    ];
}
