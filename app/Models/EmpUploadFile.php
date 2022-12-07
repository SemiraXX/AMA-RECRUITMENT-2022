<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpUploadFile extends Model
{
    use HasFactory;

    protected $table = 'EmpUploadFile';
    protected $connection = 'sqlsrv3';
    
    public $timestamps = false;

    protected $fillable = [
        'InfoNo',
        'UploadType',
        'UploadDesc',
        'UploadFileName',
        'FileDirectory',
        'UploadData',
        'DateUploaded',
        'AuditDate',
        'AuditBy',
        'AuditRemarks',
        'UploadedBy'
    ];
}
