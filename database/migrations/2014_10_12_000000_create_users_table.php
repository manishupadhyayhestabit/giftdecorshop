<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_type')->default('USR')->comment('USR for user or RTR for retailer and ADM for admin');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('company_name')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->unsignedBigInteger('pincode_id')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('district_id')->index();
            $table->unsignedBigInteger('state_id')->index();
            $table->unsignedBigInteger('country_id')->index();
            $table->text('address')->nullable();
            $table->boolean('newsletter')->default(0);
            $table->decimal('reward_points')->default(0);
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
            $table->foreign('pincode_id')->references('id')->on('pincodes');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('country_id')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
