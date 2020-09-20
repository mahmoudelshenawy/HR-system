<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddManagerIdToTableBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_branches', function (Blueprint $table) {
            $table->unsignedBigInteger('manager_id')->nullable()->after('email');
            $table->foreign('manager_id')->references('id')->on('employee_general_data')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_branches', function (Blueprint $table) {
            //
        });
    }
}
