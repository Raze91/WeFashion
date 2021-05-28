<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    // Définit la relation avec le modèle Product
    public function products() {
        // une taille peut avoir plusieurs produits
        return $this->hasMany(Product::class);
    }

    public $timestamps = false;
}
