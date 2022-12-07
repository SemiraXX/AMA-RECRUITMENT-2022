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
        Schema::create('tbl_applicants_reply', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('applicantID');
            $table->text('applicationID');
            $table->string('applicationStatus');
            $table->text('message');
            $table->string('messageTO');
            $table->string('datePosted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_applicants_reply');
    }
};
