<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categoria;
use App\pelicula;
use App\alquiler;
use App\compra;
use App\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class clienteController extends Controller
{

  public function __construct()
      {
          $this->middleware('auth');

          $checkIn = User::where('name','=','jordan')->first();
          if ($checkIn == 'jordan') {
                return view('index');
          }else {
                return redirect('/');
          }
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


    $buscar = $request->get('buscarpor');
    $tipo = $request->get('tipo');
    $url = $request->all();
    $peliculas = pelicula::buscarpor($tipo, $buscar)->paginate(6)->appends($url);

    $peli = pelicula::all();
      return view('index', compact('peliculas','peli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      dd($request);
          //$alquiler = new alquiler();
          //$idAlquiler =  substr($request->nombrePelicula, 0, 2);
          //$alquiler->cod_alquiler =
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $rolID = Auth::user()->id;
      $rolName = Auth::user()->name;
      $random = Str::random(2);

      $idPelicula = pelicula::findOrFail($id);



      $compra = new compra();
      $idCompra =  strtoupper($rolID.$rolName.$random);

    //  dd($idCompra);
      $compra->cod_compra = $idCompra;
      $compra->cod_pelicula_fk = $idPelicula->cod_pelicula;
      $compra->cod_users_fk = $rolID;
      $compra->precio_compra = $idPelicula->precio_venta;
      $compra->save();

      return redirect()->action("clienteController@index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolID = Auth::user()->id;
        $rolName = Auth::user()->name;
        $random = Str::random(2);

        $idPelicula = pelicula::findOrFail($id);

        $date = Carbon::now();
        $endDate = $date->addDay(7);

        $alquiler = new alquiler();
        $idAlquiler =  strtoupper($rolID.$rolName.$random);

        $alquiler->cod_alquiler = $idAlquiler;
        $alquiler->estado = "PENDIENTE";
        $alquiler->cod_pelicula_fk = $idPelicula->cod_pelicula;
        $alquiler->cod_users_fk = $rolID;
        $alquiler->precio_alquiler = $idPelicula->precio_alquiler;
        $alquiler->fecha_entrega = $endDate;

        $alquiler->save();

        return redirect()->action("clienteController@index");

        //dd($alquiler);
    }

    public function edit2($id)
    {


        //dd($alquiler);
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

      $updateAlqui = alquiler::where('created_at','=',$id)->first();

        $hoy = Carbon::now();

        $entrega = $updateAlqui->fecha_entrega;

        if($hoy->greaterThan($updateAlqui->fecha_entrega)){
            $deuda='Se acumulo una multa al monto por retraso';
          }else {
            $deuda="";
          }


      $updateAlqui->estado="SOLVENTE";
      $updateAlqui->save();
      return redirect('/verUsuarios')->with('datos','Accion Exitosa'.$deuda);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $alqui = alquiler::where('cod_users_fk','=',$id)->get();
      return view('movimientos.verAlquileres', compact('alqui'));
    }
}
