<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPolymorphicRelationshipsToLiquorApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('liquor_applications', function (Blueprint $table) {
            $table->string('business_classification');
            $table->morphs('classifiable');
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
            $table->dropColumn('business_classification');
            $table->dropColumn('classifiable_id');
            $table->dropColumn('classifiable_type');             
        });
    }
}
