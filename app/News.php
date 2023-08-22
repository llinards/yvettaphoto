<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
  use HasFactory;

  protected $fillable = ['title', 'description'];

  protected $with = ['images'];

  public function images(): HasMany
  {
    return $this->hasMany(NewsImage::class);
  }
}
