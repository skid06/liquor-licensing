<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporations', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('liquor_application_id')->unsigned()->index();
            $table->string('name');
            $table->string('address');
            $table->string('store_manager');
            $table->string('store_manager_email');
            $table->string('store_manager_phone');
            $table->string('store_manager_address');  
            $table->string('president');
            $table->string('president_email');
            $table->string('president_phone');
            $table->string('president_address');
            $table->string('vice_president');
            $table->string('vice_president_email');
            $table->string('vice_president_phone');
            $table->string('vice_president_address');      
            $table->string('secretary');
            $table->string('secretary_email');
            $table->string('secretary_phone');
            $table->string('secretary_address'); 
            $table->string('treasurer');
            $table->string('treasurer_email');
            $table->string('treasurer_phone');
            $table->string('treasurer_address'); 
            $table->string('had_business_w_other_corp_name'); 
            $table->string('other_corp_name');
            $table->string('other_corp_address');
            $table->string('state_of_incorporation');
            $table->string('date_qualified_transact_business');                       
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
        Schema::dropIfExists('corporations');
    }
}
