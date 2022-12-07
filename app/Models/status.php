<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $table = 'tbl_application_statuses';

    protected $fillable = [
        'application_id',
        'userid',
        'mrf_number',
        'complete_name',
        'status',
        'position',
        'branch',
        'interviewer',
        'exam',
        'max_attempt',
        'attempt',
        'active',
        'for_transfer',
        'hr_userid',
        'remarks',
        'message',
        'data_modified'
    ];
}
