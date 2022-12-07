<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class consent extends Model
{
    use HasFactory;

    protected $table = 'tbl_consentform';

    protected $fillable = [
        'formid',
        'userid',
        'date_applied',
        'mrf_type',
        'mrf_number',
        'position_applying',
        'status',
        'url_file'
    ];
}
