<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Permet l'intéraction pour la création / modification
    protected $fillable = ['name', 'description', 'price', "category_id", "published", "discount", "size", "ref", "image"];

    // Méthode qui permet de définir la catégorie d'un produit
    public function setCategoryIdAttribute($value)
    {
        if ($value == 0) {
            $this->attributes['category_id'] = null;
        } else {
            $this->attributes['category_id'] = $value;
        }
    }
    // Méthode qui permet de définir si un produit est en solde ou non
    public function setDiscountAttribute($value)
    {
        if ($value == "1") {
            $this->attributes['discount'] = true;
        } else {
            $this->attributes['discount'] = false;
        }
    }
    // Méthode qui permet de définir si un produit est publié ou non
    public function setPublishedAttribute($value)
    {
        if ($value == "1") {
            $this->attributes['published'] = true;
        } else {
            $this->attributes['published'] = false;
        }
    }
    // Méthode qui permet de récupérer les produits qui sont en solde
    public function scopeDiscount($query)
    {
        return $query->where('discount', true);
    }
    // Définit la relation avec le modèle Category
    public function category()
    {
        // un produit peut appartenir à une seule catégorie
        return $this->belongsTo(Category::class);
    }
    // Définit la relation avec le modèle Image
    public function image()
    {
        // un produit peut possèder une seule image
        return $this->hasOne(Image::class);
    }
    // Définit la relation avec le modèle Size
    public function sizes()
    {
        // un produit peut appartenir à plusieurs tailles
        return $this->belongsToMany(Size::class);
    }

    public $timestamps = false;
}
