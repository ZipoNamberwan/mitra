<?php

namespace Database\Seeders;

use App\Models\PhoneNumbers;
use App\Models\Surveys;
use Illuminate\Database\Seeder;

class ContentTestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhoneNumbers::factory()->count(100)->create();
        Surveys::factory()->count(5)->create();
    }
}
