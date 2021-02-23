<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h1>Stock de Peliculas</h1> <br>
<table class="table table-hover">
<thead>
<tr>
   <th scope="col">#</th>
  <th scope="col">Nombre Pelicula</th>
  <th scope="col">Categoria</th>
  <th scope="col"> Precio Alquiler</th>
  <th scope="col"> Precio Venta</th>
  <th scope="col"> Año</th>
  <th scope="col"> Descripcion</th>
  <th scope="col"> Disponible</th>


</tr>
</thead>
<tbody>

@foreach($peliculas as $idP)
<tr >
  <th scope="row">{{ $idP['cod_pelicula'] }} </th>
    <td>{{ $idP['nombre_pelicula'] }}</td>
  <td>{{ $idP['cod_categoria_fk'] }}</td>
  <td>{{ $idP['precio_alquiler'] }}</td>
  <td>{{ $idP['precio_venta'] }}</td>
  <td>{{ $idP['año'] }}</td>
  <td>{{ $idP['descripcion'] }}</td>
  <td>{{ $idP['disponilble'] }}</td>
</tr>
@endforeach
</tbody>
</table>
  </body>
</html>
