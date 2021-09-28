<?php

namespace Database\Seeders;

use App\Models\Educations;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Educations::create([
            'name' => 'SD'
        ]);
        Educations::create([
            'name' => 'SMP'
        ]);
        Educations::create([
            'name' => 'SMA'
        ]);
        Educations::create([
            'name' => 'Diploma I/II/III'
        ]);
        Educations::create([
            'name' => 'S1/DIV'
        ]);
        Educations::create([
            'name' => 'S2'
        ]);
    }
}
