<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class family extends Model
{
    use HasFactory;

    protected $table = 'tbl_family';

    protected $fillable = [
        'userid',
        'relationship',
        'name',
        'birthday',
        'occupation',
        'address',
        'contact_number'
    ];
}
