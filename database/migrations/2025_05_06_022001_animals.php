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
        Schema::create('animals', function (Blueprint $table) {
            $table->id('id_animal');
            $table->string('name',40);
            $table->unsignedTinyInteger('age');
            $table->decimal('height',5,2);
            $table->decimal('weigh',3,1);
            $table->enum('sex',['Hembra','Macho']);
            $table->date('fecha_nac');
            $table->string('descripcion', 100);
            $table->unsignedBigInteger('fk_specie');
            $table->unsignedBigInteger('fk_zone');
            $table->foreign('fk_specie')->references('id_specie')->on('species')->onDelete('cascade');
            $table->foreign('fk_zone')->references('id_zone')->on('zones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
