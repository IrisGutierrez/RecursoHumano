<?php 
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App;
use PDF;
use Illuminate\Support\Facades\DB;
use App\Altabaja;
use App\Institucion;
use Carbon\Carbon;


class AltaBajaController extends Controller
{
    public function Otranovedad(){
        $altabaja= Altabaja::all();
        
    }
public function create(){
        
        $altabaja= Altabaja::all();
        return view('Liquidacion.altabajados.altabajados');
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
        
        $datosNuevos= new Altabaja();
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
        $altabaja=Altabaja::where('colegio_id',$datosNuevos->colegio_id)->get();
        return view('Liquidacion.altabajados.altabajados',compact('altabaja'))->with('colegio_id',$datosNuevos->colegio_id);

    }
    public function ver(Request $colegio_id){
        
        $altabaja=Altabaja::where('colegio_id',$colegio_id->colegio_id)->get();
        $altados=Institucion::where('id',$colegio_id->colegio_id)->get();
        $pdf=\PDF::loadView('Liquidacion.altabajados.Veraltabajados', compact('altados','altabaja'));
        return $pdf->setPaper('a4','landscape')->stream('Liquidacion.altabajados.altabajados.pdf');
    }
    
   
    public function destroy($id){

       
          $datosDelete=Altabaja::findOrFail($id);
          $datosDelete->delete();
          return ('ELIMINADO ,VOLVER PARA ATRAS');
        } 
}