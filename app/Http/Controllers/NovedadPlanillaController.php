<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Institucion;
use Carbon\Carbon;


class NovedadPlanillaController extends Controller
{
    public function Otranovedad(){
        $altabaja= Novedad::all();
        
    }
public function create(){
        
        $altabaja= Novedad::all();
        return view('Liquidacion.Novprueba.pruebaDos');
    }


     public function store(Request $request)
    {
        $request->validate([
            'colegio_id'=>'required',
            'dni'=>'required',
            'ApellidoNommbre'=>'required',
            'Cargo'=>'required',
            'Caracter'=>'required',
            'GradoSeccion'=>'required',
            'desdeN'=>'required',
            'hastaN'=>'required', 
            'articulo'=>'required', 
             
 ]);
        
        $datosNuevos= new Novedad();
        $datosNuevos->colegio_id = $request->colegio_id;
        $datosNuevos->dni = $request->dni;
        $datosNuevos->ApellidoNommbre = $request->ApellidoNommbre;
        $datosNuevos->Cargo = $request->Cargo;
        $datosNuevos->Caracter = $request->Caracter;
        $datosNuevos->GradoSeccion = $request->GradoSeccion;
        $datosNuevos->desdeN = $request->desdeN;
        $datosNuevos->hastaN = $request->hastaN;
        $valorUno=Carbon::parse($datosNuevos->desdeN);
        $valorDos=Carbon::parse($datosNuevos->hastaN);
        $totalN= $valorUno->diffInDays($valorDos);
        $datosNuevos->totalN = $totalN;
        $datosNuevos->articulo = $request->articulo;
        $datosNuevos->observacionesN = $request->observacionesN;
        $datosNuevos->save();
        $altabaja=Novedad::where('colegio_id',$datosNuevos->colegio_id)->get();
        return view('Liquidacion.Novprueba.pruebaDos',compact('altabaja'))->with('colegio_id',$datosNuevos->colegio_id);

    }
    public function ver(Request $colegio_id){
        
        $altabaja=Novedad::where('colegio_id',$colegio_id->colegio_id)->get();
        $altados=Institucion::where('id',$colegio_id->colegio_id)->get();
        $pdf=\PDF::loadView('Liquidacion.Novprueba.verpdfNovPrueba', compact('altados','altabaja'));
        return $pdf->setPaper('a4','landscape')->stream('Liquidacion.novedad.pruebaDos.pdf');
    }
    
   
    public function destroy($id){
       
          $datosDelete=Novedad::findOrFail($id);
          $datosDelete->delete();
          return ('ELIMINADO VOLVER PARA ATRAS');
        } 
}
