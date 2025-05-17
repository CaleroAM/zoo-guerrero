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
        Schema::create('foods', function (Blueprint $table) {
            $table->id('id_food');
            $table->string('name'); 
            $table->string('content');
            $table->integer('total_amount');
            $table->integer('cost');
            $table->string('fk_supplier',20);
            $table->foreign('fk_supplier')->references('rfc')->on('suppliers')->onDelete("cascade");
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
