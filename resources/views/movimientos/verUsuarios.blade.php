@extends('layouts.theme')
@section('navbar')
 @include('layouts.nav')
@endsection
@php
use Carbon\Carbon;
use Illuminate\Support\Str;
$user1 = auth()->user();
 if($user1->name != 'jordan'){
   return redirect()->action('clienteController@index');
 }
@endphp


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



@section('body')
<div class="container-fluid"> <br><br>
<center> <h1>Listado de Usuarios</h1>
<h3>Fecha Actual: {{Carbon::now()}}</h3>
</center>
<br>
    <table class="table table-hover">
  <thead>
    <tr>
       <th scope="col">#</th>
      <th scope="col">Nombre Usuario</th>
      <th scope="col">Email Usuario</th>
      <th scope="col">Fecha Creacion</th>
      <th scope="col"> Alquileres</th>
    </tr>
  </thead>
  <tbody>

    @foreach($user as $idUser)
    <tr >
      <th scope="row">{{ $idUser['id'] }} </th>
      <td>{{ $idUser['name'] }}</td>
      <td>{{ $idUser['email'] }}</td>
      <td>{{ $idUser['created_at'] }}</td>
      <form method="POST" action="{{route('cliente.destroy', $idUser['id'] )}}">
      		@method('DELETE')
      		@csrf
      <td><button  class="btn btn-primary" type="submit" name="button">Ver Alquileres</button> </td>
</form>
    </tr>
  @endforeach
  </tbody>
</table>

</div>

@endsection
