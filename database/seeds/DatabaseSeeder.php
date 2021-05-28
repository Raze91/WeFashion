<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Appelle les différents seeders
        $this->call(UserTableSeeder::class);
        $this->call(ProductTableSeeder::class);
    }
}