<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::rename('images', 'category_images');
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::rename('category_images', 'images');
  }
};
