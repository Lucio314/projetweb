<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produits = [
            ['ref' => 'P001', 'design' => 'Télévision', 'pu' => 300.00, 'code' => 1, 'imageprod' => 'images/tv.jpg'],
            ['ref' => 'P002', 'design' => 'Canapé', 'pu' => 150.00, 'code' => 2, 'imageprod' => 'images/canape.jpg'],
            ['ref' => 'P003', 'design' => 'T-shirt', 'pu' => 20.00, 'code' => 3, 'imageprod' => 'images/tshirt.jpg'],
            // Ajoutez plus de produits si nécessaire
        ];

        foreach ($produits as $produit) {
            Produit::create($produit);
        }
    }
}
