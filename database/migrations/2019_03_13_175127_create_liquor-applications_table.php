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
            $table->string('born_outside_us', 5);
            $table->string('born_us_parents', 5);
            $table->string('date_of_birth')->nullable();
            $table->string('naturalized', 5);
            $table->string('naturalized_city')->nullable();
            $table->string('naturalized_state')->nullable();
            $table->string('naturalized_date')->nullable();
            $table->string('owner_lease_premises', 5);
            $table->string('establishment_owner_name');
            $table->string('establishment_owner_address');
            $table->string('establishment_owner_phone');
            $table->string('lessor_name')->nullable();
            $table->string('lessor_address')->nullable();
            $table->string('lessor_phone')->nullable(); 
            $table->string('lessor_end_date')->nullable(); 
            $table->string('current_lease')->nullable();
            $table->string('liquor_license_another_premise', 5); 
            $table->string('other_establishment_name')->nullable();
            $table->string('other_establishment_address')->nullable();
            $table->string('action_pending_against_owner', 5);
            $table->string('owner_been_issued_wagering_stamp', 5);
            $table->string('previous_liquor_license_been_revoked', 5);
            $table->integer('businessClassifiable_id')->unsigned()->index();
            $table->string('businessClassifiable_type');             
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
        Schema::dropIfExists('liquor-applications');
    }
}
