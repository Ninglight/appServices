<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('lang_id');
            $table->string('lang_name');

            $table->string('title');
            $table->string('url_logo');

            $table->longtext('home_baseline');
            $table->string('menu_name');
            $table->string('home_title');
            $table->string('home_questions_btn');
            $table->string('home_products_btn');

            $table->string('questions_title');
            $table->string('questions_skip');
            $table->string('questions_readmore');

            $table->longtext('category_baseline');

            $table->string('products_title');
            $table->longtext('products_baseline');
            $table->longtext('filter_baseline');
            $table->string('filter_validate');
            $table->string('filter_trash');

            $table->boolean('product_price');
            $table->string('product_price_taxe');
            $table->string('product_link_connexing');
            $table->string('product_link_cotation');
            $table->string('product_link_cotation_link');

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
        Schema::dropIfExists('parameters');
    }
}
