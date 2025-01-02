<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Import model Product

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo các sản phẩm mẫu cho kho
        Product::create([
            'name' => 'Product 1',
            'description' => 'A sample product.',
            'unit' => 'pcs',
            'purchase_price' => 100,
            'sale_price' => 150,
            'quantity' => 10,
            'import_date' => now(),
            'expiration_date' => now()->addMonths(6),
            'supplier' => 'Supplier A',
        ]);

        Product::create([
            'name' => 'Product 2',
            'description' => 'Another sample product.',
            'unit' => 'kg',
            'purchase_price' => 200,
            'sale_price' => 250,
            'quantity' => 20,
            'import_date' => now(),
            'expiration_date' => now()->addMonths(12),
            'supplier' => 'Supplier B',
        ]);

        Product::create([
            'name' => 'Product 3',
            'description' => 'Product with different price and quantity.',
            'unit' => 'liters',
            'purchase_price' => 50,
            'sale_price' => 75,
            'quantity' => 30,
            'import_date' => now(),
            'expiration_date' => now()->addMonths(3),
            'supplier' => 'Supplier C',
        ]);
    }
}
