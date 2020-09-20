<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessBranchesTable extends Migration
{

    public function up()
    {
        Schema::create('business_branches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business_type_id');
            $table->foreign('business_type_id')->references('id')->on('business_types')->onDelete('cascade');
            $table->char('name',255);
            $table->integer('phone')->nullable();
            $table->char('email',255)->nullable();
            $table->char('logo',255)->nullable();
            $table->string('documents')->nullable();
            $table->char('address',255)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
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
        Schema::dropIfExists('business_branches');
    }
}
