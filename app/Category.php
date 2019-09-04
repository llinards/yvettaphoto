<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function image()
    {
        return $this->hasMany(Image::class);
    }
    public function getRouteKeyName()
    {   
        return 'category_slug';
    }
}
