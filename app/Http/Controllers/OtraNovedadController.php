<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otranovedad;
use App\Institucion;
use Carbon\Carbon;

class OtraNovedadController extends Controller
{
    public function Otranovedad(){
        $altabaja= Otranovedad::all();
        
    }
public function create(){
        
        $altabaja= Otranovedad::all();
        return view('Liquidacion.otroNov.prueba');
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
            'observacionesN'=>'required', 
 ]);
        
        $datosNuevos= new Otranovedad();
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
        $altabaja=Otranovedad::where('colegio_id',$datosNuevos->colegio_id)->get();
        return view('Liquidacion.otroNov.prueba',compact('altabaja'))->with('colegio_id',$datosNuevos->colegio_id);

    }
    public function ver(Request $colegio_id){
        
        $altabaja=Otranovedad::where('colegio_id',$colegio_id->colegio_id)->get();
        $altados=Institucion::where('id',$colegio_id->colegio_id)->get();
        $pdf=\PDF::loadView('Liquidacion.otroNov.verpdfOtraNdos', compact('altados','altabaja'));
        return $pdf->setPaper('a4','landscape')->stream('Liquidacion.otroNov.pdf');
    }
    
   
    public function destroy($id){
        
        $datosDelete=Otranovedad::findOrFail($id);
       $datosDelete->delete();
       return ('eliminado , volver para atras');
        } 
}
