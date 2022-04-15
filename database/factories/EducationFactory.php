<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'college_name' => $this->faker->sentence,
            'major' => $this->faker->sentence,
            'GPA' => $this->faker->randomFloat(2, 1, 100),
            'start_year' => $this->faker->date,
            'end_year' => $this->faker->date,
        ];
    }
}
