<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nonacad extends Model
{
    use HasFactory;

    protected $table = 'tbl_mrf_non_acad';

    protected $fillable = [
        'dept_head_id',
        'mrf_id',
        'mrf_status',
        'rev_date',
        'branch_code',
        'branch_name',
        'position',
        'rank',
        'rank_level',
        'department',
        'department_code',
        'company_name',
        'employment_type',
        'reason_of_request' ,
        'justification',
        'gender',
        'age_range',
        'educational_attainment',
        'work_experience',
        'training_required',
        'special_skills',
        'duties_and_responsibilities',
        'supporting_documents',
        'no_of_employee_needed',
        'date_needed',
        'no_of_months',
        'resigned_employee_id',
        'resigned_employee_position',
        'resigned_effectivity_date',
        'JDCode',
        'date_filed'
    ];
}
