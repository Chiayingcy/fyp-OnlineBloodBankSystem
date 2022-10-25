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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospitalID');
            $table->foreign('hospitalID')->references('id')->on('hospitals');
            $table->unsignedBigInteger('bloodType');
            $table->foreign('bloodType')->references('id')->on('blood_types');
            $table->integer('bloodQuantity');
            $table->tinyInteger('bloodRequestStatus')->default(0);
            $table->tinyInteger('bloodRequirement');
            $table->text('reason')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('blood_requests');
    }
};
