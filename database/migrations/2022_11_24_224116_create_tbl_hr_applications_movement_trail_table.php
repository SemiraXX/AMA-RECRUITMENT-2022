<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_hr_applications_movement_trail', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hrID');
            $table->string('username');
            $table->string('modulename');
            $table->string('applicantID');
            $table->string('applicationID');
            $table->string('currentstatus');
            $table->string('actiontaken');
            $table->string('remarks');
            $table->string('othercomment');
            $table->string('datelogged');
            $table->string('ipaddress');
            $table->string('httpbrowser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_hr_applications_movement_trail');
    }
};
