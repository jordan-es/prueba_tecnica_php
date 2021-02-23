<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\PeliculaExport;
use App\Exports\CompraExport;
use App\Exports\AlquilerExport;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;

class excelController extends Controller
{
  public function export()
 {
     return Excel::download(new UsersExport, 'users.xlsx');
 }

 public function export2()
{
    return Excel::download(new PeliculaExport, 'peliculas.xlsx');
}

public function export3()
{
   return Excel::download(new CompraExport, 'compra.xlsx');
}

public function export4()
{
   return Excel::download(new AlquilerExport, 'alquiler.xlsx');
}

}
