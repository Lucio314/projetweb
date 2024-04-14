<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['code' => 1, 'libelle' => 'Électronique'],
            ['code' => 2, 'libelle' => 'Mobilier'],
            ['code' => 3, 'libelle' => 'Vêtements'],
            // Ajoutez plus de catégories si nécessaire
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
}
