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
            $table->string('description', 500);
            $table->integer('quantity');
            $table->string('unit', 10);
            $table->integer('approved_qty');
            $table->string('approved_unit', 10);
            $table->integer('issued_qty');
            $table->string('issued_unit', 10);
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
