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
        Schema::create('tbl_application_statuses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('application_id');
            $table->string('userid');
            $table->string('mrf_number');
            $table->string('complete_name');
            $table->string('status');
            $table->string('position');
            $table->string('branch');
            $table->string('interviewer');
            $table->string('exam');
            $table->string('max_attempt');
            $table->string('attempt');
            $table->string('active');
            $table->string('for_transfer');
            $table->string('hr_userid');
            $table->string('remarks');
            $table->string('message');
            $table->string('data_modified');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_application_statuses');
    }
};
