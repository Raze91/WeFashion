<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    // Méthode qui retourne la vue index avec toute les catégories de la 
    // base de donnée avec une pagination de 15
    public function index()
    {
        $categories = Category::paginate(15);

        return view('back.category.index', ['categories' => $categories]);
    }

    // Méthode qui affiche la vue du formulaire de création
    public function create()
    {

        return view('back.category.create');
    }
    // Méthode qui créer une nouvelle catégorie et redirige vers l'index
    public function store(StoreCategoryRequest $request)
    {
        // Récupére les catégories
        $categories = Category::pluck('gender', 'id')->all();

        // Boucle sur les catégories
        foreach ($categories as $category) {
            // Vérifie si la catégorie existe déjà
            // Si oui, renvoie au formulaire de création avec un message d'erreur
            if ($request->gender == $category) {
                return redirect()->route('category.create')->with('error', 'La catégorie ' . $request->gender . ' existe déjà');
            };
        }

        // Crée la categorie à partir des données de la requête
        Category::create($request->all());

        return redirect()->route('category.index')->with('success', 'Catégorie créée avec succés !');
    }

    // Méthode qui renvoie la vue du formulaire d'édition avec la catégorie selectionnée
    public function edit($id)
    {
        // Récupère la catégorie en base de donnée
        $category = Category::find($id);

        return view('back.category.edit', ['category' => $category]);
    }
    // Méthode qui met à jour la catégorie et renvoie a l'index
    public function update(StoreCategoryRequest $request, $id)
    {
        // Récupère la catégorie
        $selectedCategory = Category::find($id);

        // Récupére les catégories
        $categories = Category::pluck('gender', 'id')->all();

        // Boucle sur les catégories
        foreach ($categories as $category) {
            // Vérifie si la catégorie existe déjà
            // Si oui, renvoie au formulaire de création avec un message d'erreur
            if ($request->gender == $category) {
                return redirect()->route('category.edit', $selectedCategory->id)->with('error', 'La catégorie ' . $request->gender . ' existe déjà');
            };
        }


        // Met à jour la catégorie
        $selectedCategory->update($request->all());


        return redirect()->route('category.index')->with('success', 'Categorie mise à jour avec succès !');
    }
    // Méthode qui supprime la catégorie et redirige vers l'index
    public function destroy($id)
    {
        // Récupére la catégorie
        $category = Category::find($id);
        // Supprime la catégorie en base de donnée
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Catégorie supprimé avec succés !');
    }
}
