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

        factory(App\Product::class, 20)->create()->each(function ($product) {
            // associe une categorie à un produit
            $category = App\Category::find(rand(1, 2));

            // pour chaque $product on lui associe un genre en particulier
            $product->category()->associate($category);

            $files = Storage::allFiles($category->gender == "Homme" ? "hommes" : "femmes");

            $fileIndex = array_rand($files);
            $file = $files[$fileIndex];

            // ajout des images

            $product->image()->create([
                'link' => $file
            ]);


            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
