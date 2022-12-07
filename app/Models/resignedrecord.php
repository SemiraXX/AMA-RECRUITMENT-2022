<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resignedrecord extends Model
{
    use HasFactory;

    protected $table = 'tbl_managed_resignation_record';

    protected $fillable = [
        'dept_head_id',
        'mrf_id',
        'mrf_status',
        'transaction_id',
        'branch_code',
        'employee_name',
        'position',
        'remarks',
        'date_filed'
    ];
}
