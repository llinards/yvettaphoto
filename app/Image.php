<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function category() 
    {
        return $this->hasOne(Category::class);
    }
}