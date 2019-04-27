<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignToLimitedLiabilityCompanyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('limited_liability_company_members', function (Blueprint $table) {
            $table->foreign('llc_id')
                ->references('id')->on('limited_liability_companies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('limited_liability_company_members', function (Blueprint $table) {
            //
        });
    }
}
