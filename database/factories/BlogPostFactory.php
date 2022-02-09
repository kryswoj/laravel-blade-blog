<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => function() {
                return User::all()->random()->id;
            },
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
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
