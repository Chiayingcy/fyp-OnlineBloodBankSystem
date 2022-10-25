<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_tests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('ic', 12)->unique();
            $table->integer('age');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            
            $table->unsignedBigInteger('bloodType');
            $table->foreign('bloodType')->references('id')->on('blood_types');

            $table->string('gender', 6);
            $table->string('phoneNo', 11);
            $table->string('address');
            $table->string('zipCode', 5);

            // This ensures that the state_code must be a valid / existing one
            $table->unsignedBigInteger('stateID');
            $table->foreign('stateID')->references('stateID')->on('states');            
            $table->unsignedBigInteger('role')->default(1);
            $table->foreign('role')->references('id')->on('roles');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('user_tests');
    }
};
