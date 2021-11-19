<?php

namespace Database\Factories;

use App\Models\Mitras;
use App\Models\User;
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
        $mitra = Mitras::factory()->create();
        User::create([
            'name' => $mitra->name,
            'email' => $mitra->email,
            'password' => '',
            'avatar' => $mitra->photo
        ]);
        return [
            'phone' => $this->faker->phoneNumber,
            'is_main' => true,
            'mitra_id' => $mitra->email,
        ];
    }
}
