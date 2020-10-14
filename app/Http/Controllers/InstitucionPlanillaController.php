<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Institucion;
use App\Altabaja;
use App\Novedad;
use App\Otranovedad;


class InstitucionPlanillaController extends Controller
{
    
    public function InstOtrasNov(Request $colegio_id){
        
        //$var=$colegio_id->colegio_id;
        $otranov=Otranovedad::where ('colegio_id',$colegio_id->colegio_id)->get();
    }

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
