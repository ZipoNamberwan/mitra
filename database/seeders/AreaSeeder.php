<?php

namespace Database\Seeders;

use App\Models\Subdistricts;
use App\Models\Villages;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tongas = Subdistricts::create([
            'code' => '010',
            'name' => 'Tongas'
        ]);
        Villages::create([
            'name' => 'Pamatan',
            'code' => '001',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Sumberkramat',
            'code' => '002',
            'subdistrict' => $tongas->id
        ]);
        Villages::create([
            'name' => 'Sumberrejo',
            'code' => '003',
            'subdistrict' => $tongas->id
        ]);
    }
}
