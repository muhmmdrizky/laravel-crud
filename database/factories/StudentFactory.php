<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'student_id' => $this->faker->numberBetween(000001, 999999),
            'class_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'gender' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
