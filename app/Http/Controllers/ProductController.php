<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProductRequest;
use App\Product;
use App\Size;
use ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Array_ as TypesArray_;
use phpDocumentor\Reflection\Types\Object_;
use PhpParser\Node\Expr\Array_;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(15);

        return view('back.product.index', ['products' => $products]);
    }
    public function create()
    {
        // permet de récupérer une collection type array avec en clé id => name
        $categories = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('value', 'id')->all();

        $token = bin2hex(random_bytes(8));

        return view('back.product.create', ['categories' => $categories, 'ref' => $token, "sizes" => $sizes]);
    }

    public function store(StoreProductRequest $request)
    {

        $product = Product::create($request->all());

        $product->sizes()->attach($request->sizes);

        $im = $request->file('picture');

        if (!empty($im)) {
            // méthode store retourne un link hash sécurisé
            $link = $request->file('picture')->store('/');


            $product->image()->create([
                'link' => $link,
            ]);
        }

        return redirect()->route('product.index')->with('message', 'Produit créé avec succés !');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::pluck('gender', 'id')->all();
        $sizes = Size::pluck('value', 'id')->all();

        return view('back.product.edit', compact('product', 'categories', 'sizes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {

        $product = Product::find($id);

        $product->update($request->all());

        $product->sizes()->sync($request->sizes);

        // $im = $request->file('picture');

        // // si on associe une image à un book 
        // if (!empty($im)) {

        //     $link = $request->file('picture')->store('/');

        //     // suppression de l'image si elle existe 
        //     if ($book->picture) {
        //         Storage::disk('local')->delete($book->picture->link); // supprimer physiquement l'image
        //         $book->picture()->delete(); // supprimer l'information en base de données
        //     }

        //     // mettre à jour la table picture pour le lien vers l'image dans la base de données
        //     $book->picture()->create([
        //         'link' => $link,
        //         'title' => $request->title_image ?? $request->title
        //     ]);
        // }


        return redirect()->route('product.index')->with('message', 'Produit mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Produit supprimé avec succés !');
    }
}
