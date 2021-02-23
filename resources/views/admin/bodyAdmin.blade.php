


@section('alert')

	@if (session('datos'))
	<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
		{{session('datos')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
  @endif
@endsection
<div class="container-fluid"> <br><br>
<center> <h1>Listado de Peliculas</h1></center>
<br>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Pelicula</th>
      <th scope="col">Año Emision</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Precio Alquiler</th>
      <th scope="col">Precio Venta</th>
      <th scope="col">Modificar</th>
      <th scope="col">Eliminar</th>
      <th scope="col">Diponibilidad</th>

    </tr>
  </thead>
  <tbody>
        @foreach($peliculas as $idPelicula)
    <tr >
      <th scope="row" >{{$idPelicula->cod_pelicula}}</th>
      <td>{{$idPelicula->nombre_pelicula}}</td>
      <td>{{$idPelicula->año}}</td>
      <td>{{$idPelicula->descripcion}}</td>
      <td>{{$idPelicula->precio_alquiler}}</td>
      <td>{{$idPelicula->precio_venta}}</td>
      <td> <a href="{{route('cms.edit', $idPelicula->cod_pelicula)}}">
        <button type="button" class="btn btn-success">Editar</button></a> </td>

      <td> <a href="{{route('cms.confirmar', $idPelicula->cod_pelicula)}}">
        <button type="button" class="btn btn-danger">Eliminar</button></a>  </td>
        <td>{{$idPelicula->disponilble}}</td>
    </tr>


        @endforeach
  </tbody>
</table>
</div>
<center>
<a href="/registroPeliculas" type="button" name="button" class="btn-primary btn-lg">Insertar Peliculas</a>
</center>
