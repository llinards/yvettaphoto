<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $guarded = [];

  protected $with = ['category'];

  public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function scopeImagesDesc($query, $category)
  {
    return $query->where('category_id', $category->id)->orderBy('created_at', 'DESC');
  }
}
