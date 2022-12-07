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
        Schema::create('tbl_ifteaching_position', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid');
            $table->string('subject_taught');
            $table->string('school');
            $table->string('inclusive_dates');
            $table->string('salary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_ifteaching_position');
    }
};
