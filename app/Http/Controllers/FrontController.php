<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{
    // Méthode qui transmet les catégories de la base de donnée à la barre de navigation
    public function __construct()
    {
        // méthode pour injecter des données à une vue partielle
        view()->composer('partials.menu', function ($view) {
            $categories = Category::pluck('gender', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories); // on passe les données à la vue
        });
    }
    // Méthode qui renvoie la vue de la page d'accueil avec tout les produits avec une pagination de 6
    public function index() {
        $products = Product::paginate(6);

        return view("front.index", ["products" => $products]);
    }
    // Méthode qui renvoie la vue détaillé du produit choisi
    public function show(int $id)
    {
        return view('front.product', ['product' => Product::find($id)]);
    }
    // Méthode qui renvoie la vue des pages des catégories séléctionnées
    public function showCategories(int $id)
    {
        // Récupére les produits associées à la catégorie choisi avec une pagination de 6
        $products = Category::find($id)->products()->paginate(6);

        return view('front.category', ['products' => $products, 'category' => Category::find($id)]);
    }
    // Méthode qui renvoie la vue des produits en soldes
    public function showDiscount() {
        // Récupère les produits dont le champ discount est à true, avec une pagination à 6
        $products = Product::discount()->paginate(6);

        return view('front.discount', ['products' => $products]);
    }
}
