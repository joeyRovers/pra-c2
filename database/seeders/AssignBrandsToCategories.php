<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;

class AssignBrandsToCategories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get categories
        $smartphones = Category::where('slug', 'smartphones')->first();
        $electronics = Category::where('slug', 'electronics')->first();
        $computing = Category::where('slug', 'computing')->first();
        $gaming = Category::where('slug', 'gaming')->first();
        $audioVideo = Category::where('slug', 'audio-video')->first();
        $homeAppliances = Category::where('slug', 'home-appliances')->first();

        // Assign brands to categories (example brands - adjust to your actual data)
        $brandAssignments = [
            // Smartphones
            'Samsung' => $smartphones,
            'Apple' => $smartphones,
            'Sony' => $smartphones,
            'HTC' => $smartphones,
            'LG' => $smartphones,
            'Huawei' => $smartphones,
            'OnePlus' => $smartphones,
            'Nokia' => $smartphones,

            // Electronics
            'Philips' => $electronics,
            'Panasonic' => $electronics,
            'Toshiba' => $electronics,
            'Sharp' => $electronics,
            'Pioneer' => $electronics,

            // Computing
            'HP' => $computing,
            'Dell' => $computing,
            'Lenovo' => $computing,
            'Acer' => $computing,
            'Asus' => $computing,
            'Microsoft' => $computing,
            'Intel' => $computing,
            'AMD' => $computing,

            // Gaming
            'PlayStation' => $gaming,
            'Xbox' => $gaming,
            'Nintendo' => $gaming,
            'Logitech' => $gaming,
            'Razer' => $gaming,

            // Audio & Video
            'JBL' => $audioVideo,
            'Bose' => $audioVideo,
            'Sennheiser' => $audioVideo,
            'Audio-Technica' => $audioVideo,
            'Yamaha' => $audioVideo,
            'Denon' => $audioVideo,

            // Home Appliances
            'Whirlpool' => $homeAppliances,
            'Bosch' => $homeAppliances,
            'Siemens' => $homeAppliances,
            'AEG' => $homeAppliances,
            'Miele' => $homeAppliances,
            'Electrolux' => $homeAppliances,
        ];

        foreach ($brandAssignments as $brandName => $category) {
            $brand = Brand::where('name', 'LIKE', '%' . $brandName . '%')->first();
            if ($brand && $category) {
                $brand->update(['category_id' => $category->id]);
                echo "Assigned {$brand->name} to {$category->name}\n";
            }
        }
    }
}
