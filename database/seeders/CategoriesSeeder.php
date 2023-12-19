<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Categories::create([
            'id' => '1',
            'category_name' => 'Default',
            'parent_id' => '1',
        ]);
        Categories::create([
            'category_name' => 'Default',
            'parent_id' => '1',
        ]);
        Categories::create([
            'category_name' => 'Default',
            'parent_id' => '1',

        ]);
        Categories::create([
            'category_name' => 'Default',
            'parent_id' => '1',
        ]);
    }
}
