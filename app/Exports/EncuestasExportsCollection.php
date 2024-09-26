<?php

namespace App\Exports;

use App\Models\Encuestas;
use Maatwebsite\Excel\Concerns\FromCollection;

class EncuestasExportsCollection implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Encuestas::all();
    }
}
