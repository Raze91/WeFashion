<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création des catégories
        App\Category::create([
            "gender" => "Homme"
        ]);

        App\Category::create([
            "gender" => "Femme"
        ]);

        App\Size::create([
            "value" => "XS",
        ]);
        App\Size::create([
            "value" => "S",
        ]);
        App\Size::create([
            "value" => "M",
        ]);
        App\Size::create([
            "value" => "L",
        ]);
        App\Size::create([
            "value" => "XL",
        ]);

        factory(App\Product::class, 20)->create()->each(function ($product) {
            // associe une categorie à un produit
            $category = App\Category::find(rand(1, 2));

            // pour chaque $product on lui associe un genre en particulier
            $product->category()->associate($category);

            $files = Storage::allFiles($category->gender);

            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            // ajout des images

            $product->image()->create([
                'link' => $file
            ]);

            // récupération des id des auteurs à partir de la méthode pluck d'Eloquent
            // les méthodes du pluck shuffle et slice permettent de mélanger et récupérer un certain
            // nombre de 3 à partir de l'indice 0, comme ils sont mélangés à chaque fois qu'un livre est crée
            // La méthode all permet de faire la requête et de récupérer le résultat sous forme d'un tableau
            $sizes = App\Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            $filtered_sizes = array_values(array_sort($sizes, function ($value) {
                return $value;
            }));

            // Il faut se mettre maintenant en relation avec les auteurs (relation ManyToMany)
            // et attacher les id des auteurs dans la table de liaison.
            $product->sizes()->attach($filtered_sizes);


            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
