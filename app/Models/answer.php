<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    use HasFactory;

    protected $table = 'tbl_exam_answer';

    protected $fillable = [
        'userid',
        'applicationid',
        'question_code',
        'question_no',
        'correct_answer',
        'is_correct',
        'date_submitted',
        'attempt'
    ];
}
