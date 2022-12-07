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
        Schema::create('tbl_trainings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid');
            $table->string('title');
            $table->string('date_attended');
            $table->string('resource_speaker');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_trainings');
    }
};
