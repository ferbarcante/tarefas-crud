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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->timestamp('inicio')->nullable(); // Campo 'inicio'
            $table->timestamp('pausa')->nullable(); // Campo 'pausa'
            $table->timestamp('termino')->nullable(); // Campo 'termino'
            $table->integer('tempo_gasto')->nullable(); // Campo 'tempo gasto' (em minutos, por exemplo)
            $table->string('titulo'); // Campo 'titulo'
            $table->timestamps(); // Adiciona created_at e updated_at

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
