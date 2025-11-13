<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed 5 brands
        $brands = [
            ['name' => 'Nike'],
            ['name' => 'Adidas'],
            ['name' => 'Puma'],
            ['name' => 'Reebok'],
            ['name' => 'New Balance'],
        ];
        foreach ($brands as $brand) {
            Brands::create($brand);
        }

        // Seed 5 categories
        $categories = [
            ['name' => 'Sneakers'],
            ['name' => 'Running Shoes'],
            ['name' => 'Sandals'],
            ['name' => 'Boots'],
            ['name' => 'Slippers'],
        ];
        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
