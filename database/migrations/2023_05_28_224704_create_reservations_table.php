<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('typeOfMeal');
            $table->string('reservationDate');
            $table->integer('childrenGuests');
            $table->integer("adultsGuests");
            $table->string("phoneNumber");
            $table->string('country');
            $table->string('options')->nullable();
            $table->string('reservationTime', 5);
            $table->string('email');
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
