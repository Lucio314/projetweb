<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::create([
            'nom' => 'Doe',
            'prenom' => 'John',
            'adresse' => '123 Rue Exemple',
            'telephone' => '123456789',
        ]);

        Client::create([
            'nom' => 'Smith',
            'prenom' => 'Jane',
            'adresse' => '456 Avenue Exemple',
            'telephone' => '987654321',
        ]);
    }
}
