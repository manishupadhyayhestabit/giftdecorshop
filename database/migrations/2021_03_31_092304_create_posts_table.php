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
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('parent_post_id')->unsigned()->default(0);
            $table->char('layout_slug', 50);
            $table->char('post_type', 50);
            $table->string('post_title')->unique();
            $table->string('meta_title')->unique();
            $table->text('meta_description')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->longText('post_content')->nullable();
            $table->text('post_excerpt')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('slug')->unique();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['publish', 'draft']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
