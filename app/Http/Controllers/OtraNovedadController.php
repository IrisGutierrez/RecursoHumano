<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtraNovedadController extends Controller
{
    public function Otranovedad(){
        
        $altabaja= Otranovedad::all();
        return view ('liquidacion.otroNov.planillaOtraN', compact('altabaja','otra'),compact('otranov'));
    }
public function create(){ 
        //$codigo= App\Novedad::all()
        return view ('Liquidacion.Otranovedad.planillaOtraN');
    }


     public function store(Request $request)
    {
        $request->validate([
            'num'=>'required',
            'colegio_id'=>'required',
            'dni'=>'required',
            'ApellidoNommbre'=>'required',
            'Cargo'=>'required',
            'Caracter'=>'required',
            'GradoSeccion'=>'required',
            'desdeN'=>'required',
            'hastaN'=>'required',
            'totalN'=>'required', 
            'articulo'=>'required', 
            'observacionesN'=>'required', 


            ]);
        
        $datosNuevos= new Otranovedad();
        
        $datosNuevos->num = $request->num;
        $datosNuevos->colegio_id = $request->colegio_id;
        $datosNuevos->dni = $request->dni;
        $datosNuevos->ApellidoNommbre = $request->ApellidoNommbre;
        $datosNuevos->Cargo = $request->Cargo;
        $datosNuevos->Caracter = $request->Caracter;
        $datosNuevos->GradoSeccion = $request->GradoSeccion;
        $datosNuevos->desdeN = $request->desdeN;
        $datosNuevos->hastaN = $request->hastaN;
        $datosNuevos->totalN = $request->totalN;
        $datosNuevos->articulo = $request->articulo;
        $datosNuevos->observacionesN = $request->observacionesN;
        $datosNuevos->save();
        return view('Liquidacion.OtroNov.panillaOtraN')->with('colegio_id',$datosNuevos->colegio_id);

    }
    public function ver(){
        $altabaja=Otranovedad::all();
        //dd($request);
        $pdf=\PDF::loadView('liquidacion.otroNov.verpdfOtraN', compact('altabaja'));
        return $pdf->setPaper('a4', 'landscape')->stream('PlanillaNovedad.pdf');
         
    }
    public function descargar(){
        $altabaja=Otranovedad::all();
        //dd($request);
        $pdf=\PDF::loadView('Liquidacion.otroNov.descargapdfOnov', compact('altabaja'));
        return $pdf->setPaper('a4', 'landscape')->download('PlanillaNovedad.pdf');
         
    }
   
    public function delete($id){
        
        
            $datosDelete=Otranovedad::findOrFail($id);
            $datosDelete->delete();
            return back()->with('mensajeDel','Alta/Baja eliminada.');
    

        } 
}
