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
    Schema::table('images', function (Blueprint $table) {
      $table->string('camera_model')->default('Nav pieejama informācija')->change();
      $table->string('camera_make')->default('Nav pieejama informācija')->change();
      $table->integer('iso')->default(0)->change();
      $table->string('f_number')->default('Nav pieejama informācija')->change();
      $table->string('exposure_time')->default('Nav pieejama informācija')->change();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('images', function (Blueprint $table) {
      //
    });
  }
};
