<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('baskets', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('idUser')->unsigned();
      $table->foreign('idUser')->references('id')->on('users');
      $table->bigInteger('idScale')->unsigned();
      $table->foreign('idScale')->references('id')->on('scales');
      $table->integer('count')->default(null)->nullable();
      $table->boolean('purchased')->default(false);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('baskets');
  }
};
