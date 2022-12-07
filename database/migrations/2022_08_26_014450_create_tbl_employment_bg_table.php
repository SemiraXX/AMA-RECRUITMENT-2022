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
        Schema::create('tbl_employment_bg', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid');
            $table->string('employer');
            $table->string('job_title');
            $table->string('address');
            $table->string('date_employed');
            $table->string('length_of_stay');
            $table->string('contact_number');
            $table->string('starting_pay_rate');
            $table->string('ending_pay_rate');
            $table->string('separation_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_employment_bg');
    }
};
