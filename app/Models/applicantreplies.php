<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class applicantreplies extends Model
{
    use HasFactory;

    protected $table = 'tbl_applicants_reply';

    protected $fillable = [
        'applicantID',
        'applicationID',
        'applicationStatus',
        'message',
        'messageTO',
        'datePosted'
    ];
}
