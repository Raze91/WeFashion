<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Créer un compte user et un compte admin
        DB::table('users')->insert([
            [
                'name' => 'Edouard',
                'email' => 'edouard@admin.fr',
                'password' => Hash::make('admin'), // crypté le mot de passe
                'elevation' => 'admin'
            ],
            [
                'name' => 'user',
                'email' => 'user@user.fr',
                'password' => Hash::make('user'),
                'elevation' => 'user'
            ]
        ]);
    }
}
