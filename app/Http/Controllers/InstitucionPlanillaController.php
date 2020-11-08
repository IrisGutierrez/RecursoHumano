<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
            if ($_POST['elegirplanilla']) {
                $planilla=$_POST['elegirplanilla'];
                if ($planilla=='altabaja') {
                  
                    return view('Liquidacion.altaybaja')->with('colegio_id',$datosInstitucion->id);
                }
                if ($planilla=='novedades') {
                   
                    return view('Liquidacion.novedad.planillaNov')->with('colegio_id',$datosInstitucion->id);
                }
                if ($planilla=='otrasnovedades') {
                    echo 'otrasnovedades';
                }
                
            }
            
          
    }
    
    //dd($datosInstitucion);



public function filtrado(Request $request){
    //$altados=Institucion::where('id', $colegio_id->colegio_id)->get();
    $tipoplanilla=$request->get('elegirplanilla');
    $escuela=$request->get('elegirinstitu');
    $insti=Institucion::All();
    
    if ($tipoplanilla=='AltaBaja') {
        return $this->prueba($escuela);
        
    }
    if ($tipoplanilla=='Novedades') {
        return $this->pruebaNov($escuela);
       // $novedad= Novedad::all();
      //  return view('Liquidacion.novedad.planillaNov', compact('novedad'));
     }
     
     if ($tipoplanilla=='OtrasNovedades') {
        return $this->pruebaOtraNov($escuela);
        //$otra=Institucion::with('otranovedades')->get();
            
           // $otranovedad= Otranovedad::all();
       // return view('Liquidacion.otroNov.planillaOtraN', compact('otranovedad'));
         
        
         
        
     }
    return view('Liquidacion.filtlistado', compact('insti'));
}


public function prueba( $escuela){
    $altabaja= Altabaja::all();
    //  if ($escuela=='colegio_id') {
        
    // }
    $institu=Institucion::with('altabajas')->get();
   // $var=$escuela->colegio_id;
   // $alta=Altabaja::where ('colegio_id',"$var")->get();
    
   
       
    $filtro = Altabaja::where('colegio_id','=',"$escuela")->get();
    
    $union=DB::table('institucions')
        ->join('altabajas','institucions.id','=','altabajas.colegio_id')->get();
   
       
    return view ('Liquidacion.altaybaja',  compact('filtro'), compact('institu')); 
}
public function pruebaNov( $escuela){
    $novedades= Novedad::all();
    
    /* $var=$colegio_id->colegio_id;
    $alta=Altabaja::where ('colegio_id',$colegio_id->colegio_id)->get();
    $institu=Institucion::with('altasbajas')->get();
    $altabaja= Altabaja::all();*/
       
    $filtro = Novedad::where('colegio_id','=',"$escuela")->get();
    
  //  if ($escuela=='colegio_id') {
        $union=DB::table('institucions')
        ->join('novedads','institucions.id','=','novedads.colegio_id')->get();
       
   //  }
       
    return view ('Liquidacion.novedad.planillaNov',  compact('filtro','union')); 
}
public function pruebaOtraNov( $escuela){
    $otrasnovedades= Otranovedad::all();
    //  if ($escuela=='colegio_id') {
        
    // }
    /* $var=$colegio_id->colegio_id;
    $alta=Altabaja::where ('colegio_id',$colegio_id->colegio_id)->get();
    $institu=Institucion::with('altasbajas')->get();
    $altabaja= Altabaja::all();*/
       
    $filtro = Otranovedad::where('colegio_id','=',"$escuela")->get();
    $union=DB::table('institucions')
        ->join('otranovedads','institucions.id','=','otranovedads.colegio_id')->get();
   
       
    return view ('Liquidacion.otroNov.planillaOtraN',  compact('filtro','union')); 
}
   

}
