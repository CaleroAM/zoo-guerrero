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
        Schema::create('empshifts', function (Blueprint $table) {
            $table->id('id_empshift');
            $table->time('hours_worked');
            $table->string('reason',40);
            $table->unsignedBigInteger('fk_shift');
            $table->unsignedBigInteger('fk_employee');
            $table->foreign('fk_shift')->references('id_shift')->on('shifts')->onDelete('cascade');
            $table->foreign('fk_employee')->references('id_employee')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empshifts');
    }
};
