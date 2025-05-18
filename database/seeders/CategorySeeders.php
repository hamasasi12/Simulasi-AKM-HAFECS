<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'SD_LITERASI',
            ],
            [
                'name' => 'SD_NUMERASI',
            ],
            [
                'name' => 'SMP_LITERASI',
            ],
            [
                'name' => 'SMP_NUMERASI',
            ],
            [
                'name' => 'SMA_LITERASI',
            ],
            [
                'name' => 'SMA_NUMERASI',
            ],
        ];

        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}
