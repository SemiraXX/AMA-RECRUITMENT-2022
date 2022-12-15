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
        Schema::create('tbl_posted_uploaded', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid');
            $table->string('applicationID');
            $table->string('file_name');
            $table->text('file_url');
            $table->string('tagName');
            $table->string('remarks');
            $table->string('date_submitted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_posted_uploaded');
    }
};
