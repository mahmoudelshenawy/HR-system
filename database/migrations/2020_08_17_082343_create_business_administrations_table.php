<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessAdministrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_administrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_branche_id');
            $table->foreign('business_branche_id')->references('id')->on('business_branches');
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
        Schema::dropIfExists('business_administrations');
    }
}
