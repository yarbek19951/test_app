<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->timestamps();
        });
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("type_id")->unsigned()->nullable();
            $table->unsignedBigInteger("color_id")->nullable();
            $table->string("name");
            $table->timestamps();

        });
        Schema::table('products', function($table) {
            $table->foreign('type_id')->references('id')->on('types')->onDelete('set null');
            $table->foreign('color_id')->references('id')->on('sizes')->onDelete('set null');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size');
        Schema::dropIfExists('types');
        Schema::dropIfExists('products');
    }
}