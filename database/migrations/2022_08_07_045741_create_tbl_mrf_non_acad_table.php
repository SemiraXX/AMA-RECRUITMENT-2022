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
        Schema::create('tbl_mrf_non_acad', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dept_head_id');
            $table->string('mrf_id');
            $table->string('mrf_status');
            $table->string('rev_date');
            $table->string('branch_code');
            $table->string('branch_name');
            $table->string('position');
            $table->string('rank');
            $table->string('rank_level');
            $table->string('department');
            $table->string('department_code');
            $table->string('company_name');
            $table->string('employment_type');
            $table->string('reason_of_request'); 
            $table->text('justification');
            $table->string('gender');
            $table->string('age_range');
            $table->string('educational_attainment');
            $table->string('work_experience');
            $table->string('training_required');
            $table->string('special_skills');
            $table->string('duties_and_responsibilities');
            $table->string('supporting_documents');
            $table->string('no_of_employee_needed');
            $table->string('date_needed');
            $table->string('no_of_months');
            $table->string('resigned_employee_id');
            $table->string('resigned_employee_position');
            $table->string('resigned_effectivity_date');
            $table->string('JDCode');
            $table->string('date_filed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_mrf_non_acad');
    }
};
