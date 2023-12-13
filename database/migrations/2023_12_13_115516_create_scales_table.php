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
    Schema::create('scales', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('content');
      $table->longText('image')->nullable();
      $table->integer('count')->nullable();
      $table->integer('price')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('scales');
  }
};
