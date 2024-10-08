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
        Schema::create('categoria_segmentos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categoria');
            $table->integer('id_sub_categoria');
            $table->string('name');
            $table->string('slug');
            $table->boolean('status');
            $table->date('start_activation')->nullable();
            $table->date('end_activation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categoria_segmentos');
    }
};
