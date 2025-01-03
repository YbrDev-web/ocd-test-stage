<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [];
        $domains = ['gmail.com', 'yahoo.com', 'outlook.com', 'hotmail.com', 'icloud.com']; // Liste de domaines

        // Générer 40 utilisateurs
        for ($i = 1; $i <= 40; $i++) {
            // Choisir un domaine aléatoire dans la liste
            $domain = $domains[array_rand($domains)];

            $users[] = [
                'name' => 'User ' . $i,
                'email' => 'user' . $i . '@' . $domain, // Email avec domaine aléatoire
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password' . $i), // Mot de passe unique
                'remember_token' => str_random(60), // Token aléatoire
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Insérer les utilisateurs dans la table
        DB::table('users')->insert($users);
    }
}


