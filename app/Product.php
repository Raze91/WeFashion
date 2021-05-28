<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', "category_id", "published", "discount", "size", "ref", "image"];

    public function setCategoryIdAttribute($value)
    {
        if ($value == 0) {
            $this->attributes['category_id'] = null;
        } else {
            $this->attributes['category_id'] = $value;
        }
    }

    public function setDiscountAttribute($value)
    {
        if ($value == "1") {
            $this->attributes['discount'] = true;
        } else {
            $this->attributes['discount'] = false;
        }
    }

    public function setPublishedAttribute($value)
    {
        if ($value == "1") {
            $this->attributes['published'] = true;
        } else {
            $this->attributes['published'] = false;
        }
    }

    public function scopeDiscount($query)
    {
        return $query->where('discount', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }

    public $timestamps = false;
}
