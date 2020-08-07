<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDetailsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('product_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_product');
            $table->unsignedInteger('id_attr');
            $table->string('sku')->unique();
            $table->float('price',16,2);
            $table->float('discount')->nullable();
            $table->Integer('quantity')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 là Hiện, 0 là Ẩn');
            $table->timestamps();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('id_attr')->references('id')->on('attrs');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('product_details');
    }
}
