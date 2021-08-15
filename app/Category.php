<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','description','category_slug','cover_photo_url'];

    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function getRouteKeyName()
    {
        return 'category_slug';
    }

    public function scopeCategoriesDesc($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }
}
