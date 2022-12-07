<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAttachementTemp extends Model
{
    use HasFactory;

    protected $table = 'FileAttachements_Temp';
    protected $connection = 'sqlsrv2';
    
    public $timestamps = false;

    protected $fillable = [
        'SqncNo',
        'SystemSource',
        'TranNo',
        'TranType',
        'FileFullPath',
        'FileCode',
        'DateCreated',
        'Remarks',
        'ImgData',
        'BranchCode',
        'FilePriority',
        'AuditUser',
        'AuditDate',
        'AuditRemarks',
        'ApplicationId',
        'ApplicationFileName',
        'ApplicationFilePath'
    ];
}
