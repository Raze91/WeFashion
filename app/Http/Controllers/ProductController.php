<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        $products = Product::paginate(15);

        return view('back.product.index', ['products' => $products]);
    }
    public function create()
    {
        // permet de récupérer une collection type array avec en clé id => name
        $categories = Category::pluck('name', 'id')->all();

        return view('back.product.create', ['categories' => $categories]);
    }
}
