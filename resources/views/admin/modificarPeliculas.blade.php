
@extends('layouts.theme')


<div class="container-fluid" align="center">

  <h1>Modificar Pelicula</h1> <br>

  <form method="POST" action="{{route('cms.update', $peliculas->cod_pelicula)}}">
    @csrf
    	@method('PATCH')
    <div class="form-row col-8  ">
      <div class="col-6">
        Nombre Pelicula: <input type="text" class="form-control" placeholder="Nombre" name="nombrePelicula" id="nombrePelicula"
        value="{{$peliculas->nombre_pelicula}}">
      </div>

      <div class="col-6">
       Categoria: <select name='categoria' id="categoria" class="custom-select">
               <option disabled="true">Seleccione la categoria</option>

         <option value='Comedia'>Comedia</option>
         <option value='Romance'>Romance</option>
         <option value='Accion'>Accion</option>
         <option value='Magia'>Magia</option>
         <option value='Terror'>Terror</option>
           </select>
     </div>

      <div class="col-6">
        Precio Venta: <input type="text" class="form-control" placeholder="$" name="precioPelicula" id="precioPelicula"
        value="{{$peliculas->precio_venta}}">
      </div>

      <div class="col-6">
        Precio Alquiler: <input type="text" class="form-control" placeholder="$" name="rentaPelicula" id="rentaPelicula"
          value="{{$peliculas->precio_alquiler}}">
      </div>

      <div class="col-6">
        Año de emisión: <input type="text" class="form-control" placeholder="2020" name="añoPelicula" id="añoPelicula"
        value="{{$peliculas->año}}">
      </div>

      <div class="col-6">
        Categoria: <select name='disponilble' id="disponilble" class="custom-select">
                <option disabled="true">Seleccione la categoria</option>

                <option value='Si'>Si</option>
                <option value='No'>No</option>

            </select>
      </div>

      <div class="col-12">
       Descripcion: <textarea type="text" class="form-control" placeholder="Descripcion" name="descPelicula1"
       value="{{$peliculas->descripcion}}" id="descPelicula1">{{$peliculas->descripcion}}</textarea>
      </div>
  </div>


<div class="col-12"> <br>
     <button type="submit" class="btn btn-primary">Modificar Pelicula</button>
</div>
</form> <br><br><br>



</div>
