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
        Schema::create('tbl_notification_list', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('notif_id');
            $table->string('notif_for');
            $table->string('category');
            $table->text('action_remarks');
            $table->text('other_content');
            $table->string('who_viewed');
            $table->string('if_viewed');
            $table->string('date_viewed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_notification_list');
    }
};
