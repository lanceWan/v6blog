<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(0)->comment('用户ID');
            $table->integer('category_id')->default(0)->comment('分类ID');
            $table->string('title')->default('')->comment('文章标题');
            $table->string('image')->default('')->comment('文章封面');
            $table->text('body')->comment('文章正文');
            $table->tinyInteger('status')->default(0)->comment('文章状态');
            $table->integer('view')->default(0)->comment('查看文章数');
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
        Schema::dropIfExists('posts');
    }
}
