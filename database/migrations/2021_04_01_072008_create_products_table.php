<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

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
            $table->bigInteger('user_id')->unsigned()->index();
            $table->bigInteger('pincode_group_id')->unsigned();
            $table->bigInteger('optional_product_group_id')->unsigned();
            $table->integer('attribute_group_id')->nullable();
            $table->bigInteger('layout_id')->unsigned();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('meta_title')->unique();
            $table->text('meta_description');
            $table->string('meta_keyword')->nullable();
            $table->longText('description');
            $table->text('sort_description');
            $table->decimal('regular_price')->default(0);
            $table->decimal('sale_price')->default(0);
            $table->decimal('gst')->default(0);
            $table->string('sku');
            $table->string('model')->nullable();
            $table->enum('order_subtrack', ['yes', 'no'])->default('yes');
            $table->smallInteger('minimum_order')->default(1);
            $table->smallInteger('maximum_order')->default(4);
            $table->unsignedInteger('qty')->default(10);
            $table->json('images');
            $table->json('related_products')->nullable();
            $table->json('attributes')->nullable();
            $table->bigInteger('product_views')->default(1);
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pincode_group_id')->references('id')->on('pincode_groups')->onDelete('cascade');
            $table->foreign('optional_product_group_id')->references('id')->on('optional_product_groups')->onDelete('cascade');
            $table->foreign('layout_id')->references('id')->on('layouts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('products');
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
