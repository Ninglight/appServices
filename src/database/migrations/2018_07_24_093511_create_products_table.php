<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('constructor_reference')->unique();
            $table->string('connexing_reference')->unique();
            $table->decimal('price', 8, 2);
            $table->string('url_ecommerce')->unique();
            $table->string('external_url_img');
            $table->boolean('status');
            $table->integer('category_id')->reference('id')->on('categories')->onDelete('cascade');
            $table->integer('brand_id')->reference('id')->on('brands')->onDelete('cascade');
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
