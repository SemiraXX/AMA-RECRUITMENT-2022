<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emprecord extends Model
{
    use HasFactory;

    protected $table = 'EmpRecord';
    protected $connection = 'sqlsrv3';
    
    public $timestamps = false;

    protected $fillable = [
        'InfoNo',
        'UserID',
        'EmpStatus',
        'EmpStartDate',
        'EmpResign',
        'EmpTitle',
        'EmpPositionCode',
        'EmpRankCode',
        'EmpTitle_Designate',
        'EmpPositionCode_Designate',
        'EmpRankCode_Designate',
        'DesignateStartDate',
        'DesignateEndDate',
        'PayrollTag',
        'PaySchedCode',
        'TimeKeepingCode',
        'No_Overtime',
        'No_ChangeDayOff',
        'MaxHoursLabel',
        'MaxHoursValue',
        'EmpPositionLevel',
        'EmpPositionLevel_Designate',
        'EmpRankLevel',
        'EmpRankLevel_Designate',
        'BasicPaySchemeType',
        'CompBenScheme',
        'HrsRequired',
        'BankName',
        'BankAcctNo',
        'TaxShieldPercentage',
        'MaxHoursOverloadValue',
        'MaxHoursOverloadLabel',
        'IncludePayroll',
        'EndOfContract',
        'SecondaryBankName',
        'SecondaryBankAcctNo',
        'PayrollHoldDate',
        'HoldPercentage',
        'ReHireDate',
        'RetrenchedDate',
        'RetrenchedStatus'
    ];
}
