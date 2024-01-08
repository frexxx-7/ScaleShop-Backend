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
        Schema::create('scale_fastenings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->bigInteger('idIndicator')->unsigned()->default(null);
            $table->foreign('idIndicator')->references('id')->on('scale_indicators');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scale_fastenings');
    }
};
