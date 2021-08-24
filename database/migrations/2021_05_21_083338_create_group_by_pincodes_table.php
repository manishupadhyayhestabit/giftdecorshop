<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupByPincodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_by_pincodes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pincode_group_id')->unsigned()->index();
            $table->string('pincode');
            $table->string('city_slug');
            $table->string('state_slug');
            $table->string('country_slug');
            $table->decimal('additional_price')->default(0);
            $table->enum('prepaid', ['y', 'n'])->default('y');
            $table->enum('cod', ['y', 'n'])->default('n');
            $table->json('weights');
            $table->enum('standard_delivery', ['y', 'n']);
            $table->enum('free_shipping', ['y', 'n']);
            $table->enum('fixed_time_delivery', ['y', 'n']);
            $table->enum('mid_night_delivery', ['y', 'n']);
            $table->enum('same_day_delivery', ['y', 'n']);

            $table->foreign('pincode_group_id')->references('id')->on('pincode_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_by_pincodes');
    }
}
