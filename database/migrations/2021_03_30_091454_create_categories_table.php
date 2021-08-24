<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('slug')->unique();
            $table->string('layout_slug')->default('single')->nullable();
            $table->string('name');
            $table->string('meta_title');
            $table->string('meta_keywords')->nullable();
            $table->text('meta_description');
            $table->float('price')->default(0)->nullable();
            $table->longText('description')->nullable();
            $table->longText('sort_description')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->enum('status', ['active', 'inactive']);
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
        Schema::dropIfExists('categories');
    }
}
