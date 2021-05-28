<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // Permet l'intéraction pour la création / modification
    protected $fillable = ["link", "product_id"];

    // Définit la relation avec le model Product
    public function products()
    {
        // une image peut appartenir à un produit
        return $this->belongsTo(Product::class);
    }
    public $timestamps = false;
}
