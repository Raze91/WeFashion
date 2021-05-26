<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(15);

        return view('back.category.index', ['categories' => $categories]);
    }

    public function edit($id)
    {

        $category = Category::find($id);

        return view('back.category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);


        $category->update($request->all());


        return redirect()->route('category.index')->with('message', 'Categorie mise à jour avec succès !');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Catégorie supprimé avec succés !');
    }
}
