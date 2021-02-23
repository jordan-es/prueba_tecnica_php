<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<h1>Lista de Usuarios</h1> <br>
<table class="table table-hover">
<thead>
<tr>
   <th scope="col">#</th>
  <th scope="col">Nombre</th>
  <th scope="col">Email</th>
  <th scope="col">Fecha Creacion</th>
</tr>
</thead>
<tbody>

@foreach($users as $idP)
<tr >
  <th scope="row">{{ $idP['id'] }} </th>
    <td>{{ $idP['name'] }}</td>
  <td>{{ $idP['email'] }}</td>
    <td>{{ $idP['created_at'] }}</td>
</tr>
@endforeach
</tbody>
</table>
  </body>
</html>
