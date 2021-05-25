<?php

use Illuminate\Database\Seeder;

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
            // associons un genre à un livre que nous venons de créer
            $category = App\Category::find(rand(1, 2));

            // pour chaque $book on lui associe un genre en particulier
            $product->category()->associate($category);
            $product->save(); // il faut sauvegarder l'association pour faire persister en base de données
        });
    }
}
