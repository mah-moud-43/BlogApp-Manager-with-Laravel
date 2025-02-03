<?php
namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run()
    {
        // إنشاء 500 مقال باستخدام الـ Factory
        Post::factory(500)->create();
    }
}

