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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("isbn");
            $table->string("portada");
            $table->year("anio_publicacion");
            $table->enum('estado', ['disponible', 'prestado', 'extraviado'])->default('disponible');
            $table->unsignedBigInteger("autor_id")->default(1); //  El valor por defecto es para que no de un pete, luego lo actualizo
            $table->unsignedBigInteger("ubicacion_id")->default(1);
            $table->timestamps();

            $table->foreign('autor_id')->references('id')->on('autores')->onDelete('cascade');
            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
