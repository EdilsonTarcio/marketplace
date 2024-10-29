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
        Schema::create('livro_preco', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_vendedor')->constrained('vendedores');
            $table->foreignId('id_usuario_cricao')->constrained('users');
            $table->foreignId('id_produto')->constrained('produtos');
            $table->double('valor');
            $table->double('valor_oferta')->nullable();
            $table->timestamp('inicio_oferta')->nullable();
            $table->timestamp('fim_oferta')->nullable();
            $table->double('valor_promocao')->nullable();
            $table->timestamp('inicio_promocao')->nullable();
            $table->timestamp('fim_promocao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro_preco');
    }
};
