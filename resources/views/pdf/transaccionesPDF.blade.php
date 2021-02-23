

<center><h1>Movimientos de Peliculas</h1></center>
<table class="table table-hover">
<thead>
<tr>
   <th scope="col">#</th>
  <th scope="col">Nombre Pelicula</th>
  <th scope="col">Usuario</th>
  <th scope="col">Precio Alquiler</th>
  <th scope="col">Fecha Entrega</th>
  <th scope="col">Fecha Prestamo</th>
  <th scope="col"> Estado</th>
</tr>
</thead>
<tbody>

@foreach($alquiler as $idAlqui)
<tr >
  <th scope="row">{{ $idAlqui['cod_alquiler'] }} </th>
  <td>{{ $idAlqui['cod_pelicula_fk'] }}</td>
  <td>{{ $idAlqui['cod_users_fk'] }}</td>
  <td>{{ $idAlqui['precio_alquiler']}}</td>
  <td>{{ $idAlqui['fecha_entrega']}}</td>
    <td>{{ $idAlqui['created_at']}}</td>
  <td>{{ $idAlqui['estado']}}</td>
</tr>
@endforeach
</tbody>
</table>
