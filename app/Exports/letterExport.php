<?php

namespace App\Exports;

use App\Models\letter;
use Maatwebsite\Excel\Concerns\FromCollection;

class letterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return letter::all();
    }
}
