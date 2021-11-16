<?php

namespace Database\Factories;

use App\Models\Mitras;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneNumbersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => $this->faker->phoneNumber,
            'is_main' => true,
            'mitra_id' => Mitras::factory()->create(),
        ];
    }
}
