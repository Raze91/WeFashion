<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Product;

class FrontController extends Controller
{
    public function __construct()
    {
        // méthode pour injecter des données à une vue partielle
        view()->composer('partials.menu', function ($view) {
            $categories = Category::pluck('gender', 'id')->all(); // on récupère un tableau associatif ['id' => 1]
            $view->with('categories', $categories); // on passe les données à la vue
        });
    }

    public function index() {
        $products = Product::all();

        return view("front.index", ["products" => $products]);
    }

    public function show(int $id)
    {
        return view('front.show', ['product' => Product::find($id)]);
    }

    public function showCategories(int $id)
    {
        $products = Category::find($id)->products()->paginate(6);

        return view('front.category', ['products' => $products, 'category' => Category::find($id)]);
    }

    public function showDiscount() {
        $products = Product::discount()->paginate(6);

        return view('front.discount', ['products' => $products]);
    }
}
