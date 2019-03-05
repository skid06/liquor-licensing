<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquor_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('business_address');
            $table->string('business_phone');
            $table->string('business_email');
            $table->string('business_contact_person');
            $table->string('business_contact_title');
            $table->string('business_contact_phone');
            $table->string('business_classification');
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
        Schema::dropIfExists('liquor_applications');
    }
}
