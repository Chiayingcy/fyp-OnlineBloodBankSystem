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
        Schema::create('hospitals_blood_bank_inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospitalID');
            $table->foreign('hospitalID')->references('id')->on('hospitals');
            $table->unsignedBigInteger('bloodType');
            $table->foreign('bloodType')->references('id')->on('blood_types');
            $table->integer('bloodQuantity');
            $table->integer('bloodStatus')->default(0);
            $table->integer('requireBloodQuantity')->nullable();
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
        Schema::dropIfExists('hospitals_blood_bank_inventories');
    }
};
