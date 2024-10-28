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
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->text('banner');
            $table->string('fone');
            $table->string('email');
            $table->string('descricao');
            $table->text('facebook_link')->nullable();
            $table->text('instagram_link')->nullable();
            $table->text('x_link')->nullable();
            $table->text('youtube_link')->nullable();
            $table->integer('id_usuario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
