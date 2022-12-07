<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empmaster extends Model
{
    use HasFactory;


    protected $table = 'EmpMaster';
    protected $connection = 'sqlsrv3';
    
    public $timestamps = false;

    protected $fillable = [
        'InfoNo',
        'UserID',
        'LastName',
        'FirstName',
        'MiddleName',
        'SuffixName',
        'AkaName',
        'Gender',
        'Birthdate',
        'BirthPlace',
        'CivilStatus',
        'Citizenship',
        'Religion',
        'Branchcode',
        'DeptCode',
        'JDCode',
        'TerminationReason',
        'EmploymentStatus',
        'EmpType',
        'ApplicantNo',
        'BlackListReason',
        'ParentID',
        'TaggedAs'
    ];
}
