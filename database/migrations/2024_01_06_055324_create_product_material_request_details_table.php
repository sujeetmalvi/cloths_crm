<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMaterialRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_material_request_details', function (Blueprint $table) {
            $table->id('request_detail_id');
            $table->integer('material_request_id');
            $table->string('material_code');
            $table->string('description', 500)->nullable();
            $table->integer('quantity');
            $table->unsignedSmallInteger('unit');
            $table->integer('approved_qty')->nullable();
            // $table->unsignedSmallInteger('approved_unit')->nullable();
            $table->integer('issued_qty')->nullable();
            // $table->unsignedSmallInteger('issued_unit')->nullable();
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
        Schema::dropIfExists('product_material_request_details');
    }
}
