<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phat_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administrator_id')->nullable()->unsigned();
            $table->integer('product_industry_id')->unsigned();
            $table->integer('product_category_id')->unsigned();
            $table->string('name')->uniqid();
            $table->string('slug');
            $table->text('picture')->nullable();
            $table->text('content')->nullable();
            $table->string('flag')->default('Y');
            $table->timestamps();
        });

        Schema::table('phat_product', function($table) {
            $table->foreign('administrator_id')->references('id')->on('phat_administrator')->onDelete('set null');
            $table->foreign('product_industry_id')->references('id')->on('phat_product_industry');
            $table->foreign('product_category_id')->references('id')->on('phat_product_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phat_product');
    }
}
