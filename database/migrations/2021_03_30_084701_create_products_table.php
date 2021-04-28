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
            $table->string('name');
            $table->double('price',3,2);
            $table->boolean('published')->default(false);
            $table->smallInteger('order')->default(0);
            $table->string('short_description')->nullable();;
            $table->longText('description')->nullable();;
            $table->string('image')->nullable();;
            $table->string('gallery')->nullable();;
            $table->string('meta_title')->nullable();;
            $table->string('meta_description')->nullable();;
            $table->string('slug')->unique();
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
