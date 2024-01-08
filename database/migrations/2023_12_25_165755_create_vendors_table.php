<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id('vendor_id');
            $table->string('vendor_firm_name');
            $table->string('contact_person');
            $table->text('address_1');
            $table->unsignedSmallInteger('city_id');
            $table->unsignedSmallInteger('state_id');
            $table->string('pincode');
            $table->string('contact_person_number');
            $table->string('firm_number');
            $table->string('email');
            $table->unsignedInteger('referred_by');
            $table->string('applicable_taxes');
            $table->enum('blacklisted', ['Yes', 'No']);
            $table->enum('status', ['Active', 'Inactive']);
            $table->softDeletes();
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
        Schema::dropIfExists('vendors');
    }
}
