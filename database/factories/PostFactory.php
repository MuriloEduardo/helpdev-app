<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'content' => fake()->text(),
            'amount' => fake()->randomElement([5, 10, 15, 20, 25, 30, 35, 40, 45, 50]),
            'user_id' => \App\Models\User::all()->unique()->random()->id,
        ];
    }
}
