<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'ref'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function picture() {
        return $this->hasOne(Image::class);
    }
    public $timestamps = false;
}
