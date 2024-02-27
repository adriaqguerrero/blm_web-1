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
        Schema::create('cumplimiento', function (Blueprint $table) {
            $table->id();
            //expediente
            $table->unsignedBigInteger('expediente_digital_id');
            $table->foreign('expediente_digital_id')->references('id')->on('expediente_digital')->onDelete('cascade');
            $table->integer('dictamen')->default(1);
            $table->dateTime('fecha_dictamen')->nullable();
            $table->integer('status_cumplimiento')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cumplimiento');
    }
};
