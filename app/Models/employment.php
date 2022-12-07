<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employment extends Model
{
    use HasFactory;

    protected $table = 'tbl_employment_bg';

    protected $fillable = [
        'userid',
        'employer',
        'job_title',
        'address',
        'date_employed',
        'length_of_stay',
        'contact_number',
        'starting_pay_rate',
        'ending_pay_rate',
        'separation_reason',
    ];
}
