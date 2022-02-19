<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public $prefix = [
        'Junior ',
        'Mid ',
        'Senior '
    ];

    public $job = [
        'PHP',
        '.NET',
        'JavaScript',
        'SWIFT',
        'Java',
        'Python',
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'bio' => $this->faker->sentence(25),
            'job' => $this->prefix[array_rand($this->prefix)] . $this->job[array_rand($this->job)] . ' developer',
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    public function johnDoe()
    {
        return $this->state(function () {
            return [
                'name' => 'John Doe',
                'email' => 'john@test.com',
                'is_admin' => true,
                'job' => 'Junior PHP developer',
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
