<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->char('brand_name', 25);
            $table->text('product_name');
            $table->char('merchant_name', 25);
            $table->integer('custom_1');
            $table->char('size', 15);
            $table->text('alternate_image');
            $table->text('merchant_category');
            $table->bigInteger('merchant_product_id');
            $table->integer('in_stock');
            $table->char('display_price',30);
            $table->integer('base_price');
            $table->text('description');
            $table->char('suitable_for', 10);
            $table->text('material');
            $table->char('colour', 40);
            $table->integer('is_for_sale');
            $table->char('currency', 10);
            $table->text('merchant_deep_link');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
