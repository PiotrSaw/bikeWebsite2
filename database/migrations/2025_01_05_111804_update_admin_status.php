<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('users')
            ->where('email', 'admin@admin.pl')
            ->update(['status' => 'ADMIN']);
    }

    public function down()
    {
        DB::table('users')
            ->where('email', 'admin@admin.pl')
            ->update(['status' => 'USER']);
    }

};
