<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionalProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('optional_products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('optional_product_group_id')->unsigned()->index();
            $table->string('name');
            $table->string('image');
            $table->decimal('price')->default(0);
            $table->timestamps();
            $table->foreign('optional_product_group_id')->references('id')->on('optional_product_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('optional_products');
    }
}
