<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Vases',
            'Placards',
            'Lampes',
            'Miroirs',
            'Tables',
            'Décoration Murale',
            'Rangement',
            'Textile Déco'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => 'Découvrez notre collection de ' . strtolower($category) . ' pour une maison élégante.',
                'image' => null,
            ]);
        }
    }
}
