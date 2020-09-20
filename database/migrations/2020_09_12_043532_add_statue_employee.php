<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatueEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_general_data', function (Blueprint $table) {
            $table->enum('statue', ['active', 'inactive','resignation','retired','early_retirement','deceased'])->nullable()->after('employee_bank_account_name')->default('active');
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
