<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsCorporationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corporations', function (Blueprint $table) {
            $table->string('store_manager_name')->nullable()->change();
            $table->string('store_manager_email')->nullable()->change();
            $table->string('store_manager_phone')->nullable()->change();
            $table->string('store_manager_address')->nullable()->change();  
            $table->string('president_name')->nullable()->change();
            $table->string('president_email')->nullable()->change();
            $table->string('president_phone')->nullable()->change();
            $table->string('president_address')->nullable()->change();
            $table->string('vice_president_name')->nullable()->change();
            $table->string('vice_president_email')->nullable()->change();
            $table->string('vice_president_phone')->nullable()->change();
            $table->string('vice_president_address')->nullable()->change();      
            $table->string('secretary_name')->nullable()->change();
            $table->string('secretary_email')->nullable()->change();
            $table->string('secretary_phone')->nullable()->change();
            $table->string('secretary_address')->nullable()->change(); 
            $table->string('treasurer_name')->nullable()->change();
            $table->string('treasurer_email')->nullable()->change();
            $table->string('treasurer_phone')->nullable()->change();
            $table->string('treasurer_address')->nullable()->change(); 
            $table->string('had_business_other_corporation')->nullable()->change(); 
            $table->string('other_corporate_name')->nullable()->change();
            $table->string('other_corporate_address')->nullable()->change();
            $table->string('date_qualified_transact_business')->nullable()->change();  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corporations', function (Blueprint $table) {
            //
        });
    }
}
