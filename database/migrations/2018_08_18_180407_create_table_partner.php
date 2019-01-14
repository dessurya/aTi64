<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phat_partner', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('administrator_id')->nullable()->unsigned();
            $table->string('name');
            $table->text('picture')->nullable();
            $table->string('web')->nullable();
            $table->string('flag')->default('N');
            $table->timestamps();
        });

        Schema::table('phat_partner', function($table) {
            $table->foreign('administrator_id')->references('id')->on('phat_administrator')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phat_partner');
    }
}
