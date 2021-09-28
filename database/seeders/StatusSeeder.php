<?php

namespace Database\Seeders;

use App\Models\Statuses;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Statuses::create([
            'name' => 'Sudah Mendaftar'
        ]);
        Statuses::create([
            'name' => 'Diterima'
        ]);
        Statuses::create([
            'name' => 'Ditolak'
        ]);
    }
}
