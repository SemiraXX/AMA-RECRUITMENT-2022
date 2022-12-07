<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class resume extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new \App\Models\resume([
            'applicant_name' => 'Maiky1',
            'applicant_details' => 'Sample details1',
            'remarks'  => 'Samle remarks1'
        ]);

        $employee -> save();

        $employee = new \App\Models\resume([
            'applicant_name' => 'Maiky2',
            'applicant_details' => 'Sample details2',
            'remarks'  => 'Samle remarks2'
        ]);

        $employee -> save();
    }
}
