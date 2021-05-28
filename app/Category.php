<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Permet l'intéraction pour la création / modification
    protected $fillable = ['gender'];

    // Définit la relation avec le modèle Product
    public function products()
    {
        // une catégorie peut avoir plusieurs produits
        return $this->hasMany(Product::class);
    }

    public $timestamps = false;
}
