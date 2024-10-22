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
        Schema::create('episodios', function (Blueprint $table) {
            $table->id();
            $table->integer('temporada');
            $table->string('titulo', 150);
            $table->string('descricao', 100);
            $table->integer('duracao'); // Duração em minutos
            $table->foreignId('idObraAudiovisual')->constrained('obras_audiovisuais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodios');
    }
};
