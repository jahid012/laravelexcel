<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => substr($this->faker->text(30), 0, -1),
            'body' => $this->faker->paragraph(rand(0, 3),true),
            'user_id' => $this->faker->numberBetween(1, 20),
            'created_at' => now(),
        ];
    }
}
