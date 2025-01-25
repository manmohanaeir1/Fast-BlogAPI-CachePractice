<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'content' => $this->faker->paragraph(4),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), // Select existing user or create a new one
            'slug' => Str::slug($this->faker->unique()->sentence(3)), // Generate a unique slug
            'image' => $this->faker->imageUrl(640, 480, 'articles', true), // Generate a random image URL
            'is_published' => $this->faker->boolean(70), // 70% chance of being published
            'published_at' => $this->faker->optional($weight = 0.7)->dateTimeThisYear(), // Set date if published
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
