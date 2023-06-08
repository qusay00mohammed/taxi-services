<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('pickupLocation')->nullable();
            $table->string('endLocation')->nullable();
            $table->string('mile')->nullable();
            $table->string('price')->nullable();

            $table->unsignedBigInteger('taxi_id')->nullable();
            $table->foreign('taxi_id')->references('id')->on('taxis')->onDelete('cascade');

            $table->unsignedBigInteger('pickup_city_id')->nullable();
            $table->foreign('pickup_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->unsignedBigInteger('end_city_id')->nullable();
            $table->foreign('end_city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->string('pickupDate');
            $table->string('pickupTime');
            $table->tinyInteger('numberOfPeople');
            $table->tinyInteger('bag');
            $table->tinyInteger('paymentMethod');
            $table->tinyInteger('way');
            $table->string('flight_number')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('books');
    }
}
