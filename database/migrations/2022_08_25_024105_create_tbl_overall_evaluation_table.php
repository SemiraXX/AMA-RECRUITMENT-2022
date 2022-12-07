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
        Schema::create('tbl_overall_evaluation', function (Blueprint $table) {
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
            $table->text('strengths');
            $table->text('weaknesses');
            $table->text('hiring_decision');
            $table->text('is_recommended');
            $table->string('total_points');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_overall_evaluation');
    }
};
