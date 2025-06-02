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
        Schema::create('carefuls', function (Blueprint $table) {
            $table->id('id_careful');
            $table->date('date_start');
            $table->time('hours');
            $table->string('treatment', 50);
            $table->decimal('amount_food',8,2)->nullable();
            $table->unsignedBigInteger('fk_food')->nullable();
            $table->unsignedBigInteger('fk_employee');
            $table->unsignedBigInteger('fk_animal');
            $table->foreign('fk_food')->references('id_food')->on('foods')->onDelete('cascade');
            $table->foreign('fk_employee')->references('id_employee')->on('employees')->onDelete('cascade');
            $table->foreign('fk_animal')->references('id_animal')->on('animals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carefuls');
    }
};
