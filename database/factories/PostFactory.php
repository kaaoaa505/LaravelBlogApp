<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $date = now();

        $date1 = clone($date);
        $date2 = clone($date);
        $date3 = clone($date);

        $date1->addDays(rand(-20,-30));
        $date2->addDays(rand(-10,-20));
        $date3->addDays(rand(-10,10));

        $title = fake()->sentence();

        usleep(1);
        
        $hrtime = hrtime(true);
        $slug = str()->slug($title) . '_' . "{$hrtime}". '_' . rand(1000, 9999);

        $excerpt = fake()->sentence(rand(8, 12));

        $body = fake()->paragraphs(5, true);

        $image = 'Post_Image_' . rand(1, 5) . '.jpg';

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
            'created_at' => $date1,
            'updated_at' => $date2,
            'published_at' => rand(1,0) ? $date3 : null,
        ];
    }
}
