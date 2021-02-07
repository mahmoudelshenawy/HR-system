<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFinancialStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_financial_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('allowance_id');
            $table->unsignedBigInteger('deduction_id');

            $table->foreign('employee_id')->references('id')->on('employee_general_data')->onDelete('cascade');

            $table->foreign('allowance_id')->references('id')->on('employee_allowances')->onDelete('cascade');

            $table->foreign('deduction_id')->references('id')->on('employee_deductions')->onDelete('cascade');

            $table->integer('basic_salary')->default(0);

            $table->integer('variable_salary')->default(0);

            $table->integer('insurance_basic')->default(0);

            $table->integer('insurance_variable')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_financial_statuses');
    }
}
