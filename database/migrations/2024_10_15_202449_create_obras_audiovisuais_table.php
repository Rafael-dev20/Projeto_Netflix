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
        Schema::create('obras_audiovisuais', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 150);
            $table->string('descricao', 400)->nullable();
            $table->date('ano_lancamento')->nullable();
            $table->foreignId('idDiretor')->constrained('diretores')->onDelete('cascade');
            $table->foreignId('idCategoria')->constrained('categorias')->onDelete('cascade');
            $table->foreignId('idVideo')->constrained('videos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras_audiovisuais');
    }
};
