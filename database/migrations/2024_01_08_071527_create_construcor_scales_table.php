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
        Schema::create('construcor_scales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idPlatforms')->unsigned();
            $table->bigInteger('idNPV')->unsigned();
            $table->bigInteger('idMaterial')->unsigned();
            $table->bigInteger('idIndicator')->unsigned();
            $table->bigInteger('idStrainGuages')->unsigned();
            $table->bigInteger('idFastening')->unsigned();
            $table->foreign('idPlatforms')->references('id')->on('scale_platforms')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idNPV')->references('id')->on('scale_n_p_v_s')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idMaterial')->references('id')->on('scale_materials')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idIndicator')->references('id')->on('scale_indicators')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idFastening')->references('id')->on('scale_fastenings')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idStrainGuages')->references('id')->on('scale_strain_gauges')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construcor_scaleштшs');
    }
};
