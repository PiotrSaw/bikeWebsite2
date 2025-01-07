<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairBookingsTable extends Migration
{
    /**
     * Uruchom migrację.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repair_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Id użytkownika
            $table->string('name');
            $table->string('email');
            $table->date('repair_date');
            $table->string('bike_type');
            $table->json('repair_items'); // Będzie przechowywało naprawiane elementy roweru
            $table->enum('payment_method', ['gotówka', 'kartaPłatnicza', 'blik', 'kartaPodatunkowa']);
            $table->timestamps();

            // Klucz obcy do tabeli users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Wycofaj migrację.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repair_bookings');
    }
}
