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
        Schema::create('produto_por_categorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produto')->constrained('produtos');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->foreignId('id_subcategoria')->constrained('sub_categorias');
            $table->foreignId('id_categoria_segmento')->constrained('categoria_segmentos');
            $table->foreignId('id_usuario_cricao')->constrained('users');
            $table->foreignId('id_vendedor')->constrained('vendedores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produto_por_categorias');
    }
};
