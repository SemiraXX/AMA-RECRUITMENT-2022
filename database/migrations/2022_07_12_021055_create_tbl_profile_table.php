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
        Schema::create('tbl_profile', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('userid');
            $table->string('isverified ');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('suffix');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->string('contact_number');
            $table->string('complete_address');
            $table->string('province');
            $table->string('city');
            $table->string('brgy');
            $table->string('status ');
            $table->string('code');
            $table->string('birthdate');
            $table->string('birthplace');
            $table->string('civilstatus');
            $table->string('citizenship');
            $table->string('religion');
            $table->string('mother_name');
            $table->string('father_name');
            $table->string('spouse');
            $table->string('drivers_license');
            $table->string('restriction');
            $table->string('no_of_siblings');
            $table->string('sss');
            $table->string('tin');
            $table->string('philhealth');
            $table->string('pagibig');
            $table->string('login_count');
            $table->string('last_login');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_profile');
    }
};
