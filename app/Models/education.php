<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;

    protected $table = 'tbl_educational_background';

    protected $fillable = [
        'userid',
        'educational_level',
        'name_of_institution',
        'address',
        'degree',
        'date_attended'
    ];
}
