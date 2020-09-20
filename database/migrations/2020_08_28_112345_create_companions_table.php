<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('id')->references('id')->on('employee_general_data')->onDelete('cascade')->onUpdate('cascade');
            $table->char('name'   ,50);
            $table->enum('relative_relation'   ,array_keys(config('enums.companions')));
            $table->char('national_id',20)->nullable();
            $table->char('residence_number',20)->nullable();
            $table->string('birth_date')->nullable();
            $table->boolean('medical_insurance_statue')->nullable();
            $table->unsignedBigInteger('medical_insurance_id')->nullable();
            $table->foreign('medical_insurance_id')->references('id')->on('medical_insurances')->onDelete('cascade');
            $table->integer('medical_insurance_number')->nullable();
            $table->char('medical_insurance_type','50')->nullable();
            $table->string('medical_insurance_start_data')->nullable();
            $table->string('medical_insurance_end_data')->nullable();
            $table->boolean('statue');
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
        Schema::dropIfExists('companions');
    }
}
