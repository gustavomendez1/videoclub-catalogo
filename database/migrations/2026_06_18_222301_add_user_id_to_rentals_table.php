<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            // 🔑 Vinculamos el alquiler con el ID del usuario que inició sesión
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->after('movie_id');
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
