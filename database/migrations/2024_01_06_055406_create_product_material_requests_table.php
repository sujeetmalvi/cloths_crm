<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMaterialRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_material_requests', function (Blueprint $table) {
            $table->id('material_request_id');
            $table->string('order_no');
            $table->integer('requested_by')->nullable();
            $table->integer('verified_by')->nullable();
            $table->dateTime('verified_date')->nullable();
            $table->integer('approved_by')->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->integer('issued_by')->nullable();
            $table->dateTime('issued_date')->nullable();
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
        Schema::dropIfExists('product_material_requests');
    }
}