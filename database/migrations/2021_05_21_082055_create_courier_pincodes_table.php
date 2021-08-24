<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierPincodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_pincodes', function (Blueprint $table) {
            $table->id();
            $table->string('pincode')->unique();
            $table->enum('prepaid', ['Y', 'N']);
            $table->enum('cod', ['Y', 'N']);
            $table->enum('surface', ['Y', 'N']);
            $table->enum('reverse_pickup', ['Y', 'N']);
            $table->string('zone');
            $table->string('tat');
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
        Schema::dropIfExists('courier_pincodes');
    }
}
