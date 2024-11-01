<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = \App\Models\Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'job_title' => $this->faker->jobTitle,
            'academic_degrees' => $this->faker->randomElement(['Bachelor', 'Master', 'PhD']),
            'professional_experiences' => $this->faker->text(200),
            'photo' => $this->faker->imageUrl(200, 200, 'people'),
        ];
    }
}
