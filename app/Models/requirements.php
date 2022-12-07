<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requirements extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_requirements';

    protected $fillable = [
        'userid',
        'application_id',
        'requirement_name',
        'file_code',
        'is_posted',
        'file_name',
        'file_url',
        'remarks',
        'date_submitted'
    ];
}
