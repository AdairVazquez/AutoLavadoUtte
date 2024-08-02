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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_servicio');
            $table->unsignedBigInteger('id_auto');
            $table->dateTime('fecha');

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_auto')->references('id')->on('autos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
