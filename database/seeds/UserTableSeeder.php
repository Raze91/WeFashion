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
        DB::table('users')->insert([
            [
                'name' => 'Edouard',
                'email' => 'edouard@admin.fr',
                'password' => Hash::make('admin'), // crypté le mot de passe
                'elevation' => 'admin'
            ],
            [
                'name' => 'Sami',
                'email' => 'sami@lem.fr',
                'password' => Hash::make('sami'),
                'elevation' => 'user'
            ]
        ]);
    }
}
