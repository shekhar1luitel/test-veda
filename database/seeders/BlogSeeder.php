<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blogs;

class BlogSeeder extends Seeder
{
    public function run()
    {

        Blogs::create([
            'user_id' => '1',
            'name' => 'Introduction to Laravel',
            'category_id' => null,
            'detail' => 'Laravel is a PHP framework...',
        ]);
        Blogs::create([
            'user_id' => '1',
            'name' => 'Introduction to Laravel',
            'category_id' => '1',
            'detail' => 'Laravel is a PHP framework...',
        ]);Blogs::create([
            'user_id' => '1',
            'name' => 'Introduction to Laravel',
            'category_id' => '1',
            'detail' => 'Laravel is a PHP framework...',

        ]);Blogs::create([
            'user_id' => '1',
            'name' => 'Introduction to Laravel',
            'category_id' => '1',
            'detail' => 'Laravel is a PHP framework...',
        ]);

    }
}
