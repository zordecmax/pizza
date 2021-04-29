<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCategoryAndTagSetNullToTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->unsignedBigInteger('article_category_id')->nullable()->change();
            $table->removeColumn('image_id');
            $table->dropForeign(['image_id']);
            $table->removeColumn('tag_id');
            $table->dropForeign(['tag_id']);
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->dropForeign(['user_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->dropForeign(['article_category_id']);
            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
}
