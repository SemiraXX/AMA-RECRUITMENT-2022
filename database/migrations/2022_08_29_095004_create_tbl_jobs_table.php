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
        Schema::create('tbl_jobs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('post_id');
            $table->string('mrf_id');
            $table->string('mrf_type');
            $table->string('company_id');
            $table->string('company_name');
            $table->string('branch_code');
            $table->string('branch_name');
            $table->string('employment_type');
            $table->string('education_attainment');
            $table->string('JDCode');
            $table->text('JobDescription');
            $table->string('position');
            $table->string('date_posted');
            $table->string('date_closed');
            $table->string('expiration');
            $table->string('views');
            $table->string('saves');
            $table->string('posted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_jobs');
    }
};
