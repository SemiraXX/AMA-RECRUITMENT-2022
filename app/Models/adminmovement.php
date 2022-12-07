<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminmovement extends Model
{
    use HasFactory;

    protected $table = 'tbl_admin_movement_trail';

    protected $fillable = [
        'userid',
        'usertype',
        'action_taken',
        'otherRemarks',
        'ipaddress',
        'httpbrowser',
        'date_logged'
    ];
}
