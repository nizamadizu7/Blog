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
            'title' => $this->faker->sentence(mt_rand(3, 6)),
            'slug' => $this->faker->unique()->slug(3, false),
            'excerpt' => $this->faker->paragraph(),
            // 'content' => $this->faker->paragraph(mt_rand(2, 5)),

            // 'content' => '<p>' . implode('</p><p>' . $this->faker->paragraphs(mt_rand(2, 5))) . '</p>',

            // 'content' => collect($this->faker->paragraphs(mt_rand(5, 10)))
            //     ->map(function ($paragraph) {
            //         return '<p>' . $paragraph . '</p>';
            //     }),

            'content' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($paragraph) => '<p>' . $paragraph . '</p>')
                ->implode(''),
            'user_id' => mt_rand(1, 4),
            'category_id' => mt_rand(1, 3),
        ];
    }
}
