<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOblubeneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oblubene', function (Blueprint $table) {
            $table->integer('user_id');
            $table->char('brand_name', 25);
            $table->text('product_name');
            $table->char('size', 15);
            $table->text('alternate_image');
            $table->bigInteger('merchant_product_id');
            $table->char('display_price',30);
            $table->integer('base_price');
            $table->char('suitable_for', 10);
            $table->char('colour', 40);
            $table->text('merchant_deep_link');
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
        Schema::dropIfExists('oblubene');
    }
}
