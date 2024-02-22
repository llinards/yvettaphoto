<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description', 'category_slug', 'cover_photo_url'];

  public function getRouteKeyName(): string
  {
    return 'category_slug';
  }

  public function images(): HasMany
  {
    return $this->hasMany(CategoryImage::class);
  }
}
