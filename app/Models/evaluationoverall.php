<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evaluationoverall extends Model
{
    use HasFactory;

    protected $table = 'tbl_overall_evaluation';

    protected $fillable = [
       'level_count',
       'application_id',
       'userid',
       'candidate',
       'interviewer',
       'interviewer_id',
       'date_interviewed',
       'position',
       'strengths',
       'weaknesses',
       'hiring_decision',
       'is_recommended',
       'total_points'      
    ];
}
