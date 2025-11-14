<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => fake()->numberBetween(1,5),
            'category_name' => fake()->name(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'news_title' => fake()->name(),
            'news_title_slug' => strtolower(str_replace(' ', '-', fake()->name())),
            'news_details' => fake()->paragraph(),
            
            'tags' => fake()->name(),
            'breaking_news' => fake()->numberBetween(0,1),
            'top_slider' => fake()->numberBetween(0,1),
            'first_three' => fake()->numberBetween(0,1),
            'first_nine' => fake()->numberBetween(0,1),

            'post_date' => fake()->dateTimeBetween('2025-02-01', '2025-02-28')->format('Y-m-d'),
            'post_month' => date('F'),
            'image' => fake()->imageUrl(640, 480),
            'created_at' => now(),
        ];
    }
}
