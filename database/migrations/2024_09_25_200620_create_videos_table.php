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
        Schema::create('videos', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('title'); // Título do vídeo
            $table->text('description')->nullable(); // Descrição do vídeo, pode ser nulo
            $table->string('slug')->unique(); // URL amigável única
            $table->string('youtube_id'); // ID do vídeo no YouTube
            $table->string('image')->nullable(); // URL ou caminho da imagem
            $table->boolean('featured')->default(false); // Indica se é destacado
            $table->boolean('activated')->default(true); // Indica se está ativado
            $table->timestamps(); // Campos 'created_at' e 'updated_at' automaticamente
            $table->foreignId('idCategoria')->constrained('categorias')->onDelete('cascade'); // Chave estrangeira para 'category_id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
