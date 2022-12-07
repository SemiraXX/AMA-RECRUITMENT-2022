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
        Schema::create('tbl_consentform', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('formid');
            $table->string('userid');
            $table->string('date_applied');
            $table->string('mrf_type');
            $table->string('mrf_number');
            $table->string('position_applying');
            $table->string('status');
            $table->string('url_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_consentform');
    }
};
