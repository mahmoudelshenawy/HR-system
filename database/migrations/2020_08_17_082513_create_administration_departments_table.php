<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrationDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_departments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_administration_id');
            $table->foreign('business_administration_id')->references('id')->on('business_administrations')->onDelete('cascade');
            $table->char('name',255);
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
        Schema::dropIfExists('administration_departments');
    }
}
