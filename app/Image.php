<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function scopeImagesDesc($query, $category)
    {
        return $query->where('category_id', $category->id)->orderBy('created_at', 'DESC');
    }
}
