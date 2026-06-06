<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products =
      [
          ['name' => 'Headphones', 'price' => 199.99, 'image' => 'product1.jpg'],
          ['name' => 'Smart Watch', 'price' => 299.50, 'image' => 'product2.jpg'],
          ['name' => 'Mechanical Keyboard', 'price' => 120.00, 'image' => 'product3.jpg'],
          ['name' => 'Gaming Mouse', 'price' => 75.00, 'image' => 'product4.jpg'],
          ['name' => '4K Ultra Monitor', 'price' => 450.00, 'image' => 'product5.jpg'],
          ['name' => 'Wireless Speaker', 'price' => 89.99, 'image' => 'product6.jpg'],
          ['name' => 'Camera', 'price' => 150.00, 'image' => 'product7.jpg'],
          ['name' => 'Laptop', 'price' => 379.99, 'image' => 'product8.jpg'],

      ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
