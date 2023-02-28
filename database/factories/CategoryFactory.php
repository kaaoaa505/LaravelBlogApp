<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = fake()->word();

        $slug = str()->slug($title);
        $slugsFoundCount = Category::where('slug', 'regexp', "^" . $slug . "(-[0-9])?")->count();

        if ($slugsFoundCount > 0) {
            $slug .= '_' . ($slugsFoundCount + 1);
        }

        return [
            'title' => $title,
            'slug' => $slug,
        ];
    }
}
