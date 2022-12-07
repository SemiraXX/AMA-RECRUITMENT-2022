<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class employee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new \App\Models\employee([
            'UserID' => '20211',
            'LastName' => 'Belmonte',
            'FirstName'  => 'May',
            
        ]);

        $employee -> save();
    }
}
