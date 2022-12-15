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
        $uploadedresume = new \App\Models\uploadedresume([
            'userid' => "01043127",
            'applicationID' => "1SDC01",
            'file_name' => "RESUME",
            'file_url' => "Dec-15-2022-Belmonte-Resume.pdf",
            'tagName' => "Direct Upload",
            'remarks' => "Posted",
            'date_submitted' => Now()
        ]);
        $uploadedresume -> save();


        $uploadedresume = new \App\Models\uploadedresume([
            'userid' => "01043444",
            'applicationID' => "200SDC01",
            'file_name' => "RESUME",
            'file_url' => "Dec-15-2022-Belmonte-Resume.pdf",
            'tagName' => "Direct Upload",
            'remarks' => "Posted",
            'date_submitted' => Now()
        ]);
        $uploadedresume -> save();


        $uploadedresume = new \App\Models\uploadedresume([
            'userid' => "01043555",
            'applicationID' => "300SDC01",
            'file_name' => "RESUME",
            'file_url' => "Dec-15-2022-Belmonte-Resume.pdf",
            'tagName' => "Direct Upload",
            'remarks' => "Posted",
            'date_submitted' => Now()
        ]);
        $uploadedresume -> save();

       
    }
}
