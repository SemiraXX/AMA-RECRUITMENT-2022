<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploadedresume extends Model
{
    use HasFactory;

    protected $table = 'tbl_posted_resume';

    protected $fillable = [
        'userid',
        'applicationID',
        'file_name',
        'file_url',
        'tagName',
        'remarks',
        'date_submitted'
    ];
}
