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
        $categories_array = ["Homme", "Femme"];
        foreach($categories_array as $category) {
            App\Category::create([
                "gender" => $category,
            ]);
        };

        // Création des tailles
        $size_array = ["XS","S","M","L","XL"];
        foreach($size_array as $size) {
            App\Size::create([
                "value" => $size,
            ]);
        };

        // Création de 80 produits
        factory(App\Product::class, 80)->create()->each(function ($product) {
            // Choisi une catégorie parmis les 2 disponibles de base (Homme et Femme)
            $category = App\Category::find(rand(1, 2));

            // pour chaque produit, on lui associe une categorie en particulier
            $product->category()->associate($category);

            $files = Storage::allFiles($category->gender);

            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            // ajoute une image à chaque produit en base de donnée
            $product->image()->create([
                'link' => $file
            ]);

            // Créer un tableau aléatoire de tailles 
            $sizes = App\Size::pluck('id')->shuffle()->slice(0, rand(1, 5))->all();
            // Filtre le tableau
            $filtered_sizes = array_values(array_sort($sizes, function ($value) {
                return $value;
            }));

            // Attache les tailles au produit
            $product->sizes()->attach($filtered_sizes);
            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
