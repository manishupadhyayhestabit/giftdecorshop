<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_option_id')->unsigned()->index();
            $table->bigInteger('option_value_id')->unsigned()->index();
            $table->unsignedInteger('qty')->default(1);
            $table->enum('default_option_select', ['yes', 'no']);
            $table->enum('subtract_order', ['yes', 'no']);
            $table->enum('price_prefix', ['+', '-']);
            $table->float('price')->default(0);
            $table->foreign('product_option_id')->references('id')->on('product_options')->onDelete('cascade');
            $table->foreign('option_value_id')->references('id')->on('option_values')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_option_values');
    }
}
