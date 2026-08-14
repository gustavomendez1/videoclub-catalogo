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
    Schema::create('rentals', function (Blueprint $table) {
        $table->id();
        
        // 🔑 Esta línea amarra el alquiler con el ID de la película en la tabla 'movies'
        $table->foreignId('movie_id')->constrained()->onDelete('cascade');
        
        // Fechas para saber cuándo se la llevaron y cuándo la trajeron
        $table->timestamp('rented_at')->useCurrent();
        $table->timestamp('returned_at')->nullable(); 
        
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
