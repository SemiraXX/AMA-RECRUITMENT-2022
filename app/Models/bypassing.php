<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bypassing extends Model
{
    use HasFactory;

    protected $table = 'tbl_bypassing_logs';

    protected $fillable = [
        'branch',
        'dept',
        'userid',
        'category',
        'position',
        'session_id',
        'date_logged'
    ];
}
