<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCasacadeAndArticleForeinKeyToCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['user_id']);
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->change();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['article_id']);
            $table->dropForeign(['user_id']);
            $table->foreign('article_id')->references('id')->on('articles')->change();
            $table->foreign('user_id')->references('id')->on('users')->change();
        });
    }
}
