<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
      return $this->hasMany(Image::class, 'news_id');
    }
}
