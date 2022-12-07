<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminHr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminaccounts = new \App\Models\adminaccounts([
            'userid' => '12345678',
            'usertype' => 'HRD',
            'username' => 'AdminHRD',
            'accessRole' => 'hrAdmin',
            'otherTag' => 'None',
            'deptcode' => 'AMA123',
            'brancode' => 'AMA23',
            'status' => 'Active'
        ]);
        $adminaccounts -> save();

        $adminaccounts = new \App\Models\adminaccounts([
            'userid' => '12345678',
            'usertype' => 'HRD',
            'username' => 'Maiky Belmonte',
            'accessRole' => 'Admin',
            'otherTag' => 'None',
            'deptcode' => 'AMA123',
            'brancode' => 'AMA23',
            'status' => 'Active'
        ]);
        $adminaccounts -> save();
    }
}
