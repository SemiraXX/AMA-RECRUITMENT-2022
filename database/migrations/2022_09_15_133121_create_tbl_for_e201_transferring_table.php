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
        Schema::create('tbl_for_e201_transferring', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('application_id');
            $table->string('applicant_id');
            $table->string('applicant_email');
            $table->string('applicant_lname');
            $table->string('applicant_fname');
            $table->string('mrf_id');
            $table->string('date_transferred');
            $table->string('who_transferred');
            $table->string('status');
            $table->string('other_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_for_e201_transferring');
    }
};
