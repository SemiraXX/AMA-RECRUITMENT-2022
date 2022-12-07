<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userprofilekp extends Model
{
    use HasFactory;

    protected $table = 'UserProfile';
    protected $connection = 'sqlsrv4';
    
    public $timestamps = false;

    protected $fillable = [
        'UserID',
        'UserName',
        'UserApp',
        'UserRole',
        'Password',
        'ResetPassword',
        'Monitored',
        'UserStatus',
        'UserEmail',
        'BranchCode',
        'RegionCode',
        'ValidDaysStart',
        'ValidDaysEnd',
        'ValidDateStart',
        'ValidDateExpire',
        'LastUpdateBy',
        'LastUpdateDate',
        'Signature',
        'ScreenName',
        'FirstName',
        'LastName',
        'MiddleName',
        'ScopeBranch',
        'ScopeDept',
        'ScopeUnit',
        'ScopeALL',
        'DeptCode',
        'Position',
        'IsApprover',
        'Rank',
        'RFID',
        'ResetBasicInfo',
        'OBUrgent',
        'TOUrgent',
        'OBExpired',
        'PermanentOB',
        'BdayCount',
        'UrgentVL'
    ];
}
