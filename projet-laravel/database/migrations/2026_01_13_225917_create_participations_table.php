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
        Schema::create('participations', function (Blueprint $table) {
            $table->foreignId('film_id')->constrained() ;
            $table->foreignId('acteur_id')->constrained() ; 
            $table->string('role' , 20) ;
            $table->timestamps();
            $table->primary(['film_id' , 'acteur_id']) ;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
