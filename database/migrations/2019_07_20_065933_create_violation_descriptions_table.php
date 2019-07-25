<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViolationDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('violation_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text');
            $table->string('pin_code')->nullable();
            $table->integer('violation_id')->unsigned()->index();
            $table->integer('inspector_id')->unsigned()->index();
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
        Schema::dropIfExists('violation_descriptions');
    }
}
