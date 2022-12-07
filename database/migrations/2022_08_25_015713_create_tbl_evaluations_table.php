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
        Schema::create('tbl_evaluations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('level_count');
            $table->string('application_id');
            $table->string('userid');
            $table->string('candidate');
            $table->string('interviewer');
            $table->string('interviewer_id');
            $table->string('date_interviewed');
            $table->string('position');
            $table->string('evaluation_category');
            $table->string('evaluation_date');
            $table->string('evaluation_score');
            $table->text('evaluation_remarks');
            $table->string('logged_by');
            $table->string('date_logged');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_evaluations');
    }
};
