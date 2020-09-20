<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_department_id');
            $table->foreign('business_department_id')->references('id')->on('business_departments')->onDelete('cascade');
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
        Schema::dropIfExists('business_jobs');
    }
}
