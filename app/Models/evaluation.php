<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    use HasFactory;

    protected $table = 'tbl_evaluations';

    protected $fillable = [
        'level_count',
        'application_id',
        'userid',
        'candidate',
        'interviewer',
        'interviewer_id',
        'date_interviewed',
        'position',
        'evaluation_category',
        'evaluation_date',
        'evaluation_score',
        'evaluation_remarks',
        'logged_by',
        'date_logged'        
    ];
}
