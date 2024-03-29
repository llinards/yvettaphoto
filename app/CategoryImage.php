<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CategoryImage extends Model
{
  use HasFactory;

  protected $guarded = [];

  protected $with = ['category'];

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function scopeImagesDesc($query, $category)
  {
    return $query->where('category_id', $category->id)->orderBy('created_at', 'DESC');
  }
}
