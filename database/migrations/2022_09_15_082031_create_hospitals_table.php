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
        Schema::create('Hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('hospitalName', 100);
            $table->string('email')->unique();
            $table->string('hospitalLink', 512);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phoneNo', 9);
            $table->string('address');
            $table->integer('zipCode', 5);


            $table->unsignedBigInteger('stateID');
            //$table->foreign('stateID')->references('stateID')->on('states');

            $table->integer('role')->default(2);
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
        Schema::dropIfExists('Hospitals');
    }
};
