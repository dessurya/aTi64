<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phat_product_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administrator_id')->nullable()->unsigned();
            $table->integer('product_industry_id')->nullable()->unsigned();
            $table->string('name')->uniqid();
            $table->string('slug');
            $table->text('picture')->nullable();
            $table->text('content')->nullable();
            $table->string('flag')->default('N');
            $table->timestamps();
        });

        Schema::table('phat_product_category', function($table) {
            $table->foreign('administrator_id')->references('id')->on('phat_administrator')->onDelete('set null');
            $table->foreign('product_industry_id')->references('id')->on('phat_product_industry');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phat_product_category');
    }
}
