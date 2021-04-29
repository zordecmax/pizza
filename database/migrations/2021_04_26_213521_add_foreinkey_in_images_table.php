<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeinkeyInImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_images', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->unique();
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_images', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropColumn('article_id');
        });
    }
}
