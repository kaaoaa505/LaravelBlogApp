<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use DB;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        // DB::table('posts')->truncate();

        Post::factory(10)->create();
    }
}
