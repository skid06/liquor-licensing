<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitedLiabilityCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limited_liability_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('llc_manager_name')->nullable();
            $table->string('llc_manager_email');
            $table->string('llc_manager_phone');
            $table->string('store_manager_name');
            $table->string('store_manager_email');
            $table->string('store_manager_phone');
            $table->string('store_manager_address');
            $table->string('state_of_organization');
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
        Schema::dropIfExists('limited_liability_companies');
    }
}
