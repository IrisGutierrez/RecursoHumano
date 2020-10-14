<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use App\Institucion;


class NovedadPlanillaController extends Controller
{
    public function Novedad(){
        $altabaja= Novedad::all();
        $institucion= Institucion::all();
        return view ('liquidacion.novedad.planillaNov', compact('altabaja'));
    }
public function create(){
        //$codigo= App\Novedad::all()
        return view ('Liquidacion.novedad.PlanillaNov');
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
        
        $datosNuevos= new Novedad();
        
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
        return view('Liquidacion.novedad.PlanillaNov')->with('colegio_id',$datosNuevos->colegio_id);

    }
    public function ver(){
        $altabaja=Novedad::all();
        //dd($request);
        $pdf=\PDF::loadView('liquidacion.novedad.verpdfNovedad', compact('altabaja'));
        return $pdf->setPaper('a4', 'landscape')->stream('PlanillaNovedad.pdf');
         
    }
    public function descargar(){
        $altabaja=Novedad::all();
        //dd($request);
        $pdf=\PDF::loadView('liquidacion.novedad.descargarpdfNovedad', compact('altabaja'));
        return $pdf->setPaper('a4', 'landscape')->download('PlanillaNovedad.pdf');
         
    }
   
    public function delete($id){
        
        
            $datosDelete=Novedad::findOrFail($id);
            $datosDelete->delete();
            return back()->with('mensajeDel','Alta/Baja eliminada.');
    

        } 
}
