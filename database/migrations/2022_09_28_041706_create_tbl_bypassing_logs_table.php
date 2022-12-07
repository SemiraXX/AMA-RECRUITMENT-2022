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
        Schema::create('tbl_bypassing_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('branch');
            $table->string('dept');
            $table->string('userid');
            $table->string('category');
            $table->string('position');
            $table->string('session_id');
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
        Schema::dropIfExists('tbl_bypassing_logs');
    }
};
