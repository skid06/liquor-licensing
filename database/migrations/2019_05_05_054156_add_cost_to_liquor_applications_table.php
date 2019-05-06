<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCostToLiquorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('liquor_applications', function (Blueprint $table) {
            $table->integer('class_fee_id')->unsigned()->index();

            $table->foreign('class_fee_id')->references('id')->on('class_fees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('liquor_applications', function (Blueprint $table) {
            
        });
    }
}
