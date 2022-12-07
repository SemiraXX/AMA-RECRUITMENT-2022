<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notification extends Model
{

    use HasFactory;
    
    protected $table = 'tbl_notification_list';

    protected $fillable = [
        'notif_id',
        'notif_for',
        'category',
        'action_remarks',
        'other_content',
        'who_viewed',
        'if_viewed',
        'date_viewed'
    ];
}
