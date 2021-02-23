<?php

namespace App\Exports;

use App\pelicula;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\PeliculaExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeliculaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pelicula::all();
    }
}
