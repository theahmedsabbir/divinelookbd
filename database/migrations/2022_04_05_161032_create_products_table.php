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
            $table->id();
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('image');
            $table->string('name');
            $table->string('slug');
            $table->string('sku');
            $table->text('colors')->nullable();
            $table->float('discount_price', 8, 2)->nullable();
            $table->float('price', 8, 2);
            $table->unsignedBigInteger('qty');
            $table->text('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->longText('information')->nullable();
            $table->string('type')->nullable();
            $table->text('features')->nullable();
            $table->float('avg_rating', 8, 2)->nullable();
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
        Schema::dropIfExists('products');
    }
}
