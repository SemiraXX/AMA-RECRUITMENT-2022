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
        Schema::create('tbl_managed_resignation_record', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dept_head_id');
            $table->string('mrf_id');
            $table->string('mrf_status');
            $table->string('transaction_id');
            $table->string('branch_code');
            $table->string('employee_name');
            $table->string('position');
            $table->string('remarks');
            $table->string('date_filed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_managed_resignation_record');
    }
};
