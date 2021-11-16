<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SurveysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $start = $this->faker->dateTimeBetween('last month', 'now +7 days');;
        return [
            'name' => $this->faker->word,
            'start_date' => $start,
            'end_date' => $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s') . ' +21 days'),
        ];
    }
}
