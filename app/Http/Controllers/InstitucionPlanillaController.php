<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Institucion;
use App\Otranovedad;
use App\Novedad;
use App\Altabaja;


class InstitucionPlanillaController extends Controller
{
    public function create(){
        //$datos= App\Institucion::all();
       // dd($datos);
        return view('Liquidacion.novedad.Colegios');
    }
    public function store(Request $request)
    {
        $request->validate([
            'cod_escuela'=>'required',
            'Institucion'=>'required',
            'ctg'=>'required',
            'turno'=>'required',
            'domicilio'=>'required',
            'telefono'=>'required',
            'localidad'=>'required',
            'departamento'=>'required',
            'codAutenticacion'=>'required', 

            ]);
            $datos= $request->inputState;
            if ($datos == 'ALTA Y BAJA')
            {
                $datosInstitucion= new Institucion();
                $datosInstitucion->cod_escuela= $request->cod_escuela;
                $datosInstitucion->Institucion= $request->Institucion;
                $datosInstitucion->ctg= $request->ctg;
                $datosInstitucion->turno= $request->turno;
                $datosInstitucion->domicilio= $request->domicilio;
                $datosInstitucion->telefono= $request->telefono;
                $datosInstitucion->localidad= $request->localidad;
                $datosInstitucion->departamento= $request->departamento;
                $datosInstitucion->codAutenticacion= $request->codAutenticacion;
                $datosInstitucion->save();
                $altabaja=Altabaja::where('colegio_id',$datosInstitucion->colegio_id)->get();
                return view('Liquidacion.altabajados.altabajados',compact('altabaja'))->with('colegio_id',$datosInstitucion->id);
            //return view('Liquidacion.altabajados.altabajados')->with('colegio_id',$datosInstitucion->id);
            }
            else{
                if ($datos == 'NOVEDAD') {
                    $datosInstitucion= new Institucion();
                    $datosInstitucion->cod_escuela= $request->cod_escuela;
                    $datosInstitucion->Institucion= $request->Institucion;
                    $datosInstitucion->ctg= $request->ctg;
                    $datosInstitucion->turno= $request->turno;
                    $datosInstitucion->domicilio= $request->domicilio;
                    $datosInstitucion->telefono= $request->telefono;
                    $datosInstitucion->localidad= $request->localidad;
                    $datosInstitucion->departamento= $request->departamento;
                    $datosInstitucion->codAutenticacion= $request->codAutenticacion;
                    $datosInstitucion->save();
                    $altabaja=Novedad::where('colegio_id',$datosInstitucion->colegio_id)->get();
                   return view('Liquidacion.Novprueba.pruebaDos',compact('altabaja'))->with('colegio_id',$datosInstitucion->id);
                   // return view('Liquidacion.novedad.pruebaDos',compact('altabaja'))->with('colegio_id',$datosInstitucion->id);
//return view                    
                } else {
                    $datosInstitucion= new Institucion();
                    $datosInstitucion->cod_escuela= $request->cod_escuela;
                    $datosInstitucion->Institucion= $request->Institucion;
                    $datosInstitucion->ctg= $request->ctg;
                    $datosInstitucion->turno= $request->turno;
                    $datosInstitucion->domicilio= $request->domicilio;
                    $datosInstitucion->telefono= $request->telefono;
                    $datosInstitucion->localidad= $request->localidad;
                    $datosInstitucion->departamento= $request->departamento;
                    $datosInstitucion->codAutenticacion= $request->codAutenticacion;
                    $datosInstitucion->save();
                    $altabaja=Otranovedad::where('colegio_id',$datosInstitucion->colegio_id)->get();
                    return view('Liquidacion.otroNov.prueba',compact('altabaja'))->with('colegio_id',$datosInstitucion->id);
                   //return view
                }
                
            }
            
          
    }
  
   

}
