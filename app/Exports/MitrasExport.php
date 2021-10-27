<?php

namespace App\Exports;

use App\Models\Mitras;
use Maatwebsite\Excel\Concerns\FromCollection;

class MitrasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mitras::all();
    }
}
