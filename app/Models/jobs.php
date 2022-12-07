<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    use HasFactory;
    protected $table = 'tbl_jobs';

    protected $fillable = [
        'post_id',
        'mrf_id',
        'mrf_type',
        'company_id',
        'company_name',
        'branch_code',
        'branch_name',
        'employment_type',
        'education_attainment',
        'JDCode',
        'JobDescription',
        'position',
        'date_posted',
        'date_closed',
        'expiration',
        'views',
        'saves',
        'posted_by'
    ];
}
