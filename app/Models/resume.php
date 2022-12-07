<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    use HasFactory;

    
    protected $table = 'tbl_resume_file';

    protected $fillable = [
        'userid',
        'email',
        'user_name',
        'file_name',
        'file',
        'date_uploaded'
    ];
}
