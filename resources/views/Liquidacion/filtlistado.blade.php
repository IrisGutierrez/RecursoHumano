@extends('layouts.app')
@section('content')
<div class="container" >
   <!-- <div class="row justify-content-center">-->
        <div class="col-md-20">



  <form action="" > 
        
        <br>
        <!--TABLA ALTAS Y BAJAS-->

        
        <div class="card">
        <div class="card-header"><b>Buscar datos en planilla </b>
                        </div>
                      <div>
      
       
       </div>
       <div style='text-align:center;'>
       <br>
       <div class="form-group row" >
       <div class="col">
    <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de planilla</label>
    
    <select name="elegirplanilla" >
       
       <option value="" disabled selected>Planillas</option>
       
               <option value="AltaBaja">Alta-Baja</option>
               <option value="Novedades">Novedades</option>
               <option value="OtrasNovedades">Otras Novedades</option>
      
       
      </select>
    </div></div>

    <br>
  
  <div style='text-align:center;'>
  <div class="col">
    <label for="staticEmail" class="col-sm-2 col-form-label">Elegir institución</label>
    
    <select name="elegirinstitu" >
       
       <option value="" disabled selected>Instituciones</option>
       @foreach($insti ?? '' as $item)
               <option value="{{$item->id}}">{{$item->Institucion}}</option>
              
      @endforeach
       
      </select>
    
  </div></div><br>
  
  
  <div class="col-sm-10">
  <button class="btn btn-outline-success" type="submit">Search</button>
  </div>
  
</br>
  
  
  
     
     
  
  


<br>


</form>     
@endsection