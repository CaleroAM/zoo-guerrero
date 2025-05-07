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
        Schema::create('dates', function (Blueprint $table) {
            $table->id('id_date');
            $table->unsignedBigInteger('fk_employee');
            $table->string('phone',18);
            $table->string('email',40);
            $table->string('street',40);
            $table->string('cologne',40);
            $table->string('cp');
            $table->string('state',40);
            $table->foreign('fk_employee')->references('id_employee')->on('employees')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dates');
    }
};
