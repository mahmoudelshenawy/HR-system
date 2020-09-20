<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeCustomMonthlyAttendanceRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_custom_monthly_attendance_rules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employee_general_date')->onDelete('cascade');
            $table->date('day');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('employee_custom_monthly_attendance_rules');
    }
}
