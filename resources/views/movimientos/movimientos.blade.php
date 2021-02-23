@extends('layouts.theme')
@section('navbar')
 @include('layouts.nav')
@endsection
@php
use Carbon\Carbon;
use Illuminate\Support\Str;
@endphp

@section('body')
<div class="container-fluid"> <br><br>
<center> <h1>Listado de Peliculas - {{auth()->user()->name}}</h1>
<h3>Fecha Actual: {{Carbon::now()}}</h3>

</center>
<br>
    <table class="table table-hover">
  <thead>
    <tr>
       <th scope="col">#</th>
      <th scope="col">Nombre Pelicula</th>
      <th scope="col">Codigo Usuario</th>
      <th scope="col">Precio Alquiler</th>
      <th scope="col">Fecha Entrega</th>
      <th scope="col">Fecha Alquiler</th>
      <th scope="col">Estado</th>

      @if($user = auth()->user()->name == 'jordan')
      <th scope="col">Recibir Pelicula</th>
      @endif
    </tr>
  </thead>
  <tbody>
        @foreach($alquiler as $idAlquiler)
    <tr >
      <th scope="row">{{$idAlquiler->cod_alquiler}} </th>
      <td>{{$idAlquiler->cod_pelicula_fk}}</td>
      <td>{{auth()->user()->name}}</td>
      <td>{{$idAlquiler->precio_alquiler}}</td>
      <td>{{$idAlquiler->fecha_entrega}}</td>
      <td>{{$idAlquiler->created_at}}</td>
      <td>{{$idAlquiler->estado}}</td>
        @if($user = auth()->user()->name == 'jordan')
      <td> <button type="button" name="button">Recibir pelicula</button> </td>
        @endif
    </tr>
        @endforeach

  </tbody>
</table>
</div>

@endsection
