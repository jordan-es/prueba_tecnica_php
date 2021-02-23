@extends('layouts.theme')
<table class="table table-hover">
<thead>
<tr>
   <th scope="col">#</th>
  <th scope="col">Nombre Pelicula</th>
  <th scope="col">Fecha Alquiler</th>
    <th scope="col">Fecha Entrega</th>
    <th scope="col">Precio Alquiler</th>
  <th scope="col"> Estado</th>
  <th scope="col"> Accion</th>


</tr>
</thead>
<tbody>

@foreach($alqui as $idAlqui)
<tr >
  <th scope="row">{{ $idAlqui['cod_alquiler'] }} </th>
  <td>{{ $idAlqui['cod_pelicula_fk'] }}</td>
  <td>{{ $idAlqui['created_at'] }}</td>
  <td>{{ $idAlqui['fecha_entrega'] }}</td>
  <td>{{ $idAlqui['precio_alquiler']}}</td>
  <td>{{ $idAlqui['estado']}}</td>
  <form  action="{{route('cliente.update', $idAlqui['created_at'])}}" method="POST">
  @method('PUT')
	@csrf
      <td> <button type="submit" name="button" class="btn btn-primary">Recibido</button> </td>
  </form>
</tr>
@endforeach
</tbody>
</table>
