<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitedLiabilityCompanyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limited_liability_company_members', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('llc_id')->unsigned()->index();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
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
        Schema::dropIfExists('limited_liability_company_members');
    }
}
