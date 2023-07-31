<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['name', 'description', 'category_slug', 'cover_photo_url'];

  public function getRouteKeyName()
  {
    return 'category_slug';
  }

  public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
  {
    return $this->hasMany(Image::class);
  }
}
