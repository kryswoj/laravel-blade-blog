<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'content'=> $this->faker->paragraphs(5, true),
        ];
    }

    public function newTitle() {
        return $this->state(function() {
            return [
                'title' => 'New title',
            ];
        });
    }
}
