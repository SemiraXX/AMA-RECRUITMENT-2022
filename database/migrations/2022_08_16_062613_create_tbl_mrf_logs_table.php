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
        Schema::create('tbl_mrf_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('mrf_id');
            $table->string('mrf_status');
            $table->string('modified_by');
            $table->string('date_modified');
            $table->text('action_remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mrf_logs');
    }
};
