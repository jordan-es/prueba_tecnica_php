<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;
use App\pelicula;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class cmsController extends Controller
{
  public function __construct()
      {
          $this->middleware('auth');
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $categorias = categoria::all();
         $peliculas = pelicula::orderBy('nombre_pelicula', 'asc')->get();
        return view('admin.cms', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //
       $categoria = new categoria();
       $idCategoria = substr($request->categoria, 0, 2);
       $categoria->cod_categoria = $idCategoria;
       $categoria->nombre_categoria = $request->categoria;
       $categoria->save();


      $peli = new pelicula();

      $idPelicula =  substr($request->nombrePelicula, 0, 2);
      $id = $request->categoria.'-'.strtoupper($idPelicula);

        $peli->cod_pelicula =$id;
        $peli->año = $request->añoPelicula;
        $peli->disponilble = $request->disponilble;
      $peli->precio_alquiler = $request->rentaPelicula;
      $peli->precio_venta = $request->precioPelicula;
        $peli->cod_categoria_fk = $request->categoria;
          $peli->nombre_pelicula = $request->nombrePelicula;
              $peli->descripcion = $request->descPelicula1;
                $peli->save();

                return redirect('/cms')->with('datos','Registro de Pelicula Exitoso');

        //dd($peli->cod_categoria_fk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $categorias = categoria::all();
      $peliculas = pelicula::findOrFail($id);

      return view('admin.modificarPeliculas', compact('peliculas','categorias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $buscarPelicula = pelicula :: findOrFail($id);

        //dd($buscarPelicula);

      //$idPelicula =  substr($request->nombrePelicula, 0, 2);
      //$id = $request->categoria.'-'.strtoupper($idPelicula);
      //$peli->cod_pelicula =$id;

      $idPelicula =  substr($request->nombrePelicula, 0, 2);
      $id = $request->categoria.'-'.strtoupper($idPelicula);

        $buscarPelicula->cod_pelicula =$id;
      $buscarPelicula->año = $request->añoPelicula;
        $buscarPelicula->disponilble = $request->disponilble;
      $buscarPelicula->precio_alquiler = $request->rentaPelicula;
      $buscarPelicula->precio_venta = $request->precioPelicula;
          $buscarPelicula->cod_categoria_fk = $request->categoria;
            $buscarPelicula->nombre_pelicula = $request->nombrePelicula;
                $buscarPelicula->descripcion = $request->descPelicula1;
                  $buscarPelicula->update();

         return redirect('cms')->with('datos', 'Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $peliculas = pelicula::findOrFail($id);
         $peliculas->delete();
         return redirect()->route('cms.index')->with('datos','Pelicula Eliminada');
    }

    public function confirmar($id)
   {
       $categorias = categoria::all();
       $peliculas = pelicula::findOrFail($id);
       return view('admin.deletePeliculas', compact('peliculas','categorias'));
   }
}
