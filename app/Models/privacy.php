<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class privacy extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_consent';

    protected $fillable = [
        'if_agreed',
        'ip_address',
        'date_posted'
    ];
}
