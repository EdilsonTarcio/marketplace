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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->integer('sku');
            $table->string('nome');
            $table->string('slug');
            $table->text('capa');
            $table->foreignId('id_vendedor')->constrained('vendedores');
            $table->foreignId('id_usuario_cricao')->constrained('users');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->bigInteger('id_sub_categoria')->default(0);
            $table->bigInteger('id_segmento')->default(0);
            $table->foreignId('id_marca')->constrained('marcas');
            $table->string('fabricante')->nullable();
            $table->string('cor')->nullable();
            $table->text('descricao_curta');
            $table->text('descricao_longa');
            $table->text('video')->nullable();
            $table->string('codigo_barras')->nullable();
            $table->enum('tipo_listagem', ['padrao','novo','top', 'melhor', 'destaque'])->default('padrao');
            $table->boolean('status')->default(true);
            $table->timestamp('ativo_inicio')->useCurrent();
            $table->timestamp('ativo_fim')->nullable();
            $table->enum('tipo', ['produto', 'produto_variacao', 'produto_variacao_base'])->default('produto');
            $table->boolean('pesquisavel')->default(true);
            $table->boolean('pesquisavel_indisponivel')->default(false);
            $table->string('google_titulo')->nullable();
            $table->string('google_descricao')->nullable();
            $table->string('google_imagem')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
