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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id_employee');
            $table->string('name',40);
            $table->string('second_name',40);
            $table->string('last_name',40);
            $table->string('second_last_name',40);
            $table->integer('age');
            $table->enum('Sex',['Masculino','Femenino']);
            $table->string('type_empl');
            $table->unsignedBigInteger('id_boss')->nullable();
            $table->unsignedBigInteger('fk_shift');
            $table->foreign('id_boss')->references('id_employee')->on('employees')->onDelete('set null');
            $table->foreign('fk_shift')->references('id_shift')->on('shifts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
