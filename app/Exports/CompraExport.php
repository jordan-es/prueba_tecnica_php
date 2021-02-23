<?php

namespace App\Exports;

use App\compra;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\CompraExport;

class CompraExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return compra::all();
    }
}
