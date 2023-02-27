<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {

        $title = fake()->sentence();

        usleep(1);
        
        $hrtime = hrtime(true);
        $slug = str()->slug($title) . '_' . "{$hrtime}". '_' . rand(1000, 9999);

        $excerpt = fake()->sentence(rand(8, 12));

        $body = fake()->paragraphs(5, true);

        $image = 'Post_Image_' . rand(0, 5) . '.jpg';

        $users = User::pluck('id')->toArray();
        shuffle($users);
        $user = $users[0];

        return [
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'body' => $body,
            'image' => fake()->boolean() ? $image : null,
            'author_id' => $user,
        ];
    }
}
