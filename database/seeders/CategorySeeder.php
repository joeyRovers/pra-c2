<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Smartphones',
                'slug' => 'smartphones',
                'description' => 'Mobile phones and smartphones from all brands'
            ],
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'description' => 'Consumer electronics and appliances'
            ],
            [
                'name' => 'Computing',
                'slug' => 'computing',
                'description' => 'Computers, laptops, and computing devices'
            ],
            [
                'name' => 'Gaming',
                'slug' => 'gaming',
                'description' => 'Gaming consoles and gaming accessories'
            ],
            [
                'name' => 'Audio & Video',
                'slug' => 'audio-video',
                'description' => 'Audio equipment, headphones, speakers, and video devices'
            ],
            [
                'name' => 'Home Appliances',
                'slug' => 'home-appliances',
                'description' => 'Kitchen appliances, home automation, and household devices'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
