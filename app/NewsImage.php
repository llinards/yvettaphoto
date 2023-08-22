<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsImage extends Model
{
  use HasFactory;

  protected $fillable = [
    'image_location',
    'news_id'
  ];

  public function news(): BelongsTo
  {
    return $this->belongsTo(News::class);
  }
}
