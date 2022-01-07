<?php

namespace Database\Factories;

use App\Models\Mitras;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class MitrasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Mitras::class;

    public function definition()
    {
        $sexvalues = ['L', 'P'];
        $mitracounter = DB::table('counter')->where('id', 'mitras_counter')->first()->value + 1;
        DB::table('counter')->where('id', 'mitras_counter')
            ->update(['value' => $mitracounter]);
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'code' => sprintf("%05s", $mitracounter),
            'name' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'sex' => $sexvalues[$this->faker->numberBetween(0, 1)],
            'photo' => $this->faker->imageUrl($width = 640, $height = 480),
            'education' => $this->faker->numberBetween(1, 6),
            'birthdate' => $this->faker->date,
            'profession' => $this->faker->text,
            'address' => $this->faker->address,
            'village' => $this->faker->numberBetween(1, 330),
            'subdistrict' => $this->faker->numberBetween(1, 24),
        ];
    }
}
