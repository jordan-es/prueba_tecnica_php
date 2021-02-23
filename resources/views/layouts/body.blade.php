
<nav class="navbar navbar-light " >
<form class="form-inline">
  <select name="tipo" class="form-control mr-sm-2">
          <option selected>Buscar por tipo</option>
          <option value="nombre_pelicula">Nombre</option>
          <option value="año">Año</option>
  </select>
  <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Buscar">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
<div class="col">
  @if($user = auth()->user()->name == 'jordan')
  <a type="buttom" href="/cms" class="btn btn-primary " type="submit" style="margin-left:10px;">Administrar Contenido</a>
  @endif

  @if($user = auth()->user()->name != 'jordan')
  <a type="buttom" href="/verMovimientos" class="btn btn-primary " type="submit" style="margin-right:10px;">Mis Movimientos</a>
  @endif

  @if($user = auth()->user()->name == 'jordan')
  <a type="buttom" href="/verUsuarios" class="btn btn-primary " type="submit" style="margin-left:10px;">Ver Movimientos Usuarios</a>
  @endif
</div>

@if($user = auth()->user()->name == 'jordan')
<div class="dropdown star" style="margin-right:15px;" >
  <button  class="btn btn-secondary dropdown-toggle star" oneclick="enviarDatos()" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Exportar PDF
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/pdfPeliculas">Reporte de Pelicula</a>
    <a class="dropdown-item" href="/pdfUsers">Reporte de Usuarios</a>
    <a class="dropdown-item" href="/pdfTransacciones">Reporte de Transacciones</a>
  </div>
</div>

<div class="dropdown star" style="margin-right:40px;" >
  <button  class="btn btn-secondary dropdown-toggle star" oneclick="enviarDatos()" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Exportar Excel
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="/peliculas/export/">Reporte de Pelicula</a>
    <a class="dropdown-item" href="/users/export/">Reporte de Usuarios</a>
    <a class="dropdown-item" href="/alquiler/export/">Reporte de Alquiler</a>
    <a class="dropdown-item" href="/compra/export/">Reporte de Compra</a>
  </div>
</div>





@endif
</nav>








<form method="POST" action="{{route('cliente.store')}}">
  @csrf
  	@method('PATCH')

<div class="container">
<div  class="col">
  <div class="row">

  @foreach($peliculas as $itemP)
@php
  if($itemP->disponilble == 'No'){

  $valor = "none";
   }else {
  $valor = "";
    }
  @endphp

    <div class="card" style="width: 18rem; margin-left:16px; margin-top: 16px; display:{{$valor}};" >
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <h5 class="card-title font-weight-bold" name="nombrePeliculaA">{{$itemP->nombre_pelicula}}</h5>
        <p class="card-text" name="descripcionA">{{$itemP->nombre_descripcion}}</p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item" name="añoA">Año: {{$itemP->año}}</li>
        <li class="list-group-item" name="precioAlquilerA">Precio Alquiler: ${{$itemP->precio_alquiler}}</li>
        <li class="list-group-item" name="precioVentaA">Precio Venta: ${{$itemP->precio_venta}}</li>
      </ul>
      <div class="card-body">
          <a href="{{route('cliente.edit', $itemP->cod_pelicula)}}">
          <button type="button" class="btn btn-success">Rentar</button></a>
          <a href="{{route('cliente.show', $itemP->cod_pelicula)}}">
          <button type="button" class="btn btn-success">Comprar</button></a>
      </div>
    </div>

      @endforeach
        </div>
    </div>

<div style="margin-left:35%; margin-top:16px;">
   {{$peliculas->links() }}
</div>


</div>

  </form>
