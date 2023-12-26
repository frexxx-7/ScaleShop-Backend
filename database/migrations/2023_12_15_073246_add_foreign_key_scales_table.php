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
      Schema::table('scales', function (Blueprint $table) {
        $table->bigInteger('idCategoryScale')->unsigned()->default(null)->nullable();
        $table->foreign('idCategoryScale')->references('id')->on('category_scales');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('scales', function (Blueprint $table) {
        $table->dropForeign('scales_idcategoryscale_foreign');
        $table->dropColumn('idCategoryScale');
      });
    }
};
