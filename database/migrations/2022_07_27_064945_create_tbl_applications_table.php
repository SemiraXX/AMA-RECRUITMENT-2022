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
        Schema::create('tbl_applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('status');
            $table->string('application_id');
            $table->string('userid');
            $table->string('date_applied');
            $table->string('mrf_type');
            $table->string('mrf_number');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->string('suffix');
            $table->string('nickname');
            $table->string('email');
            $table->string('gender');
            $table->string('contact_no');
            $table->string('present_address');
            $table->string('province');
            $table->string('city');
            $table->string('birth_place');
            $table->string('civil_status');
            $table->string('citizenship');
            $table->string('religion');
            $table->string('employment_status');
            $table->string('driving_license_type');
            $table->string('restriction');
            $table->string('other_license');
            $table->string('no_of_siblings');
            $table->string('no_of_children');
            $table->string('spouse');
            $table->string('mother_name');
            $table->string('father_name');
            $table->string('sss');
            $table->string('tin');
            $table->string('philhealth');
            $table->string('pagibig');
            $table->string('professional_license');
            $table->string('employed');
            $table->string('previouly_employed');
            $table->string('related_to_ama_employee');
            $table->string('been_dismissed');
            $table->string('involved_in_criminal_case');
            $table->string('position_applying');
            $table->string('desired_salary');
            $table->string('latin_awards_honors');
            $table->string('tesda_cerfitification');
            $table->string('when_hear_about_us');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_applications');
    }
};
