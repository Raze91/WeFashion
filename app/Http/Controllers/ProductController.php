<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use App\Size;

class ProductController extends Controller
{
    // Méthode qui retourne tout les produits de la base de donnée avec une pagination de 15 
    // et les transmet à la vue index
    public function index()
    {
        $products = Product::paginate(15);

        return view('back.product.index', ['products' => $products]);
    }
    // Méthode qui affiche la vue du formulaire de création de produit avec 
    // les catégories et les tailles 
    public function create()
    {
        // permet de récupérer les catégories et les tailles en collection type array avec en clé id => name
        $categories = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('value', 'id')->all();

        // Créer la référence du produit de manière aléatoire
        $token = bin2hex(random_bytes(8));

        return view('back.product.create', ['categories' => $categories, 'ref' => $token, "sizes" => $sizes]);
    }

    // Méthode qui créer un nouveau Product avec les données rentrées dans le formulaire
    // et redirige vers l'index
    public function store(StoreProductRequest $request)
    {
        // Crée le Product avec les données stockées dans la requête
        $product = Product::create($request->all());
        // Attache les tailles au Produit
        $product->sizes()->attach($request->sizes);

        $im = $request->file('picture');

        // Vérifie si il y a une image dans la requête 
        if (!empty($im)) {
            // Vérifie si la catégorie choisi n'est pas "Pas de catégorie"
            if ($request->category_id !== "0") {
                // Récupère le nom de la catégorie choisie lors de la création
                $category = Category::find($request->category_id)->gender;

                // créer l'image dans le dossier de la catégorie
                $link = $request->file('picture')->store('/' . $category);
            } else {
                // créer l'image dans le dossier noCategory
                $link = $request->file('picture')->store('/NoCategory');
            }
            // Créer l'image du produit en base de donnée
            $product->image()->create([
                'link' => $link,
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Produit créé avec succés !');
    }

    // Méthode qui renvoie la vue du formulaire d'édition avec les données du produit, les catégories et les tailles 
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('value', 'id')->all();

        return view('back.product.edit', compact('product', 'categories', 'sizes'));
    }

    // Méthode qui met à jour le produit avec les données de la requête et redirige vers l'index
    public function update(StoreProductRequest $request, $id)
    {
        // Récupère le produit en base de donnée
        $product = Product::find($id);
        // Met à jour les données du produit avec celles de la requête
        $product->update($request->all());
        // Synchronise les tailles du produit
        $product->sizes()->sync($request->sizes);

        $im = $request->file('picture');

        // Vérifie si il y a une image dans la requête
        if (!empty($im)) {
            // Vérifie si la catégorie choisi n'est pas "Pas de catégorie"
            if ($request->category_id !== "0") {
                // Récupére le nom de la categorie choisie
                $category = Category::find($request->category_id)->gender;

                // créer l'image dans le dossier de la catégorie
                $link = $request->file('picture')->store('/' . $category);
            } else {
                // créer l'image dans le dossier noCategory
                $link = $request->file('picture')->store('/NoCategory');
            }
            // Si le produit possède une image, elle est supprimée
            if ($product->image) {
                $product->image()->delete(); // supprimer l'image en base de données
            }

            // mettre à jour l'image dans la base de données
            $product->image()->create([
                'link' => $link,
            ]);
        }


        return redirect()->route('product.index')->with('message', 'Produit mis à jour avec succès !');
    }
    // Méthode qui supprime le produit et redirige vers l'index
    public function destroy($id)
    {
        // Récupère le produit en base de donnée
        $product = Product::find($id);
        // Supprime le produit selectionné
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produit supprimé avec succés !');
    }
}
