<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Collar Biker Hendrix',
            'description' => 'Heavyweight premium leather biker jacket with asymmetric silver zip detailing and custom inner lining.',
            'price' => 1850000,
            'stock' => 15,
            'sku' => 'JKT-HNDRX-01',
            'image' => '/images/products/hendrix.jpg', // Path di folder public
            'category' => 'Jackets',
        ]);

        Product::create([
            'name' => 'Collar Biker Scrambler',
            'description' => 'Vintage brown distressed leather jacket engineered for performance and classic cafe racer aesthetics.',
            'price' => 1950000,
            'stock' => 10,
            'sku' => 'JKT-SCMBL-02',
            'image' => '/images/products/scrambler.jpg',
            'category' => 'Jackets',
        ]);
    }
}