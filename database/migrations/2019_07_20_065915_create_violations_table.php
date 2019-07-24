<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('complainant_name');
            $table->string('complainant_email'); 
            $table->string('complainant_phone');
            $table->string('violator_name'); 
            $table->string('violator_address');  
            $table->string('violator_city'); 
            $table->string('violator_state');
            $table->string('violator_zip'); 
            $table->string('pin_code')->nullable();  
            $table->string('ward_district_no')->nullable();  
            $table->string('status')->nullable();                                  
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
        Schema::dropIfExists('violations');
    }
}
