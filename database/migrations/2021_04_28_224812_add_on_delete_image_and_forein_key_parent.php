<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteImageAndForeinKeyParent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->dropColumn('parent');
            $table->unsignedBigInteger('parent_id')->default('0')->after('name');
            $table->foreign('parent_id')->references('id')->on('article_categories')->onDelete('restrict');
            $table->unsignedBigInteger('image_id')->nullable()->change();
            $table->dropForeign(['image_id']);
            $table->foreign('image_id')->references('id')->on('category_images')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->string('parent')->default('0');
        });
    }
}
