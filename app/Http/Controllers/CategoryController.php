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
    public function create() {
        
        return view('back.category.create');
    }
    // Méthode qui créer une nouvelle catégorie et redirige vers l'index
    public function store(StoreCategoryRequest $request) {
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
        $category = Category::find($id);

        // Met à jour la catégorie
        $category->update($request->all());


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
