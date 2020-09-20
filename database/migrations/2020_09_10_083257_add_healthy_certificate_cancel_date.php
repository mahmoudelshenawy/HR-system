<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHealthyCertificateCancelDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            $table->char('healthy_certificate_cancel_date',15)->nullable()->after('healthy_certificate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee-general_data', function (Blueprint $table) {
            //
        });
    }
}
