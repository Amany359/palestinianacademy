<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capital>
 */
class CapitalFactory extends Factory
{

    protected $model = \App\Models\Capital::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 
        return [

             'name' => $this->faker->city,
            'image' => $this->faker->imageUrl(200, 200, 'business'),
            'employee_id' => \App\Models\Employee::factory(), // إنشاء موظف وهمي مرتبط
        ];
       
    }
}
