<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pelicula;
use App\User;
use App\alquiler;
use App\compra;

class pdfController extends Controller
{
    public function generarPDF()
    {
      $peliculas = pelicula::all();
      $pdf = \PDF::loadView('pdf.peliculasPDF', compact('peliculas'));
      return $pdf->download('reportePeliculas.pdf');
    }

    public function generarPDF2()
    {
      $users = User::all();
      $pdf = \PDF::loadView('pdf.clientesPDF', compact('users'));
      return $pdf->download('reporteUsers.pdf');
    }

    public function generarPDF3()
    {
      $alquiler = alquiler::all();
      $compra = compra::all();
      $pdf = \PDF::loadView('pdf.transaccionesPDF', compact('alquiler'));
      return $pdf->download('reporteTransacciones.pdf');
    }
}
