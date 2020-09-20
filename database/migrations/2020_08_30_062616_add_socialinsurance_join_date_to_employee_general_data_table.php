<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialinsuranceJoinDateToEmployeeGeneralDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            $table->string('socialinsurance_join_date')->nullable()->after('employee_social_insurance_number');
            $table->string('socialinsurance_end_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            //
        });
    }
}
