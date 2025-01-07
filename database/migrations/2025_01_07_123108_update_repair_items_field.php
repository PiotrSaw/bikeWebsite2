<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRepairItemsField extends Migration
{
    public function up()
    {
        Schema::table('repair_bookings', function (Blueprint $table) {
            $table->set('repair_items', [
                'koła',
                'pedały',
                'łańcuch',
                'zębatki',
                'chamulce',
                'kierownica',
                'przerzutki',
                'inne'
            ])->change();
        });
    }

    public function down()
    {
        Schema::table('repair_bookings', function (Blueprint $table) {
            $table->text('repair_items')->change(); // Przywrócenie poprzedniego typu, np. TEXT
        });
    }
}
