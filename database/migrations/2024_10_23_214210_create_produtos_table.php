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
            $table->string('nome');
            $table->string('slug');
            $table->text('capa');
            $table->integer('id_vendedor');
            $table->integer('id_categoria');
            $table->integer('id_sub_categoria')->default(0);
            $table->integer('id_segmento')->default(0);
            $table->integer('id_marca');
            $table->string('cor')->nullable();
            $table->integer('qtd');
            $table->text('descricao_curta');
            $table->text('descricao_longa');
            $table->text('video')->nullable();
            $table->string('codigo_barras')->nullable();
            $table->double('valor');
            $table->double('valor_oferta')->nullable();
            $table->date('inicio_oferta');
            $table->date('fim_oferta');
            $table->boolean('top')->nullable();
            $table->boolean('melhor')->nullable();
            $table->boolean('destaque')->nullable();
            $table->boolean('status');
            $table->boolean('aprovado')->nullable();
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
