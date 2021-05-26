<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ["link", "product_id"];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public $timestamps = false;
}
