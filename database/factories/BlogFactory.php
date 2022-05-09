<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Blog::class;

    public function definition()
    {
        return [
            'name' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'post' => $this->faker->realText($maxNbChars = 1000, $indexSize = 5),
            'image' => 'https://picsum.photos/200/300?random='.rand(1,100),
            'author' => rand(1,50),
            'created_at' => $this->faker->dateTime($max = 'now', $timezone = null),
        ];
    }
}
