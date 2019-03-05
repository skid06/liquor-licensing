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
            $table->increments('liquor_application_id')->unsigned()->index();
            $table->string('llc_manager')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('member');
            $table->string('member_email');
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
