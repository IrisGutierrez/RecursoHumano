@extends('layouts.app')
@section('content')
<div class="container">
    <!-- <div class="row justify-content-center">-->
         <div class="col-md-20">
            @if(session('mensaje'))

            <div class="alert alert-danger" role="alert">{{ session('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
            </div>
            @endif
            
            <br><br>
<form method="POST" action="{{ route('Liquidacion.altabajados.altabajados') }}" >
         @csrf
       
         <!--TABLA otras novedades-->
         <div class="card-header"><b> INGRESE DATOS </b>
            <br>   
        <div class="card">
         <input type="hidden" min="0" value="{{$colegio_id ?? ''}}" style="width : 30px; heigth : 100px" name="colegio_id" >

         
        <div class="btn-group" role="group" aria-label="Basic example">
        
         
                         </div>
                         <br>
                 <div class="form-row" >
                 <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>DNI</b></u></label>
                 <div class="col-sm-3">
                 <input  name="dni" type="number" min="0"  class="form-control"   placeholder="Ingrese número de la institución">
                 </div>
                 <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Apellido Nombre</b></u></label>
            <div class="col-sm-3">
            <input  name="ApellidoNommbre" type="text"  class="form-control"   placeholder="Ingrese Apellido y Nombre">
            </div>
            <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u> Cargo </b></u></label>
            <div class="col-sm-3">
            <input  name="Cargo" type="text"  class="form-control"   placeholder="Ingrese Cargo">
            </div>   
                
         </div>
         <br>
         <div class="form-row">
            
            
                 <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u> Caracter </b></u></label>
                 <div class="col-sm-3">
                 <input  name="Caracter" type="text"  class="form-control"   placeholder="Ingrese Caracter">
                 </div>
                 <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u> Grado-Seccion</b></u></label>
                 <div class="col-sm-3">
                 <input  name="GradoSeccion" type="text"  class="form-control"   placeholder="Ingrese Grado-Seccion">
                 </div>
                
                 
         </div>
         <br>
         <div class="form-row">
            <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Desde-Fecha </b></u></label>
            <div class="col-sm-3">
            <input  name="desdeN" type="date"  class="form-control"   placeholder="Ingrese desde la fecha">
            </div>
            <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Hasta-Fecha</b></u></label>
            <div class="col-sm-3">
            <input  name="hastaN" type="date"  class="form-control"   placeholder="Ingrese hasta-fecha">
            </div>          
         </div>
         <br>
         <div class="form-row">
            <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u> Articulo </b></u></label>
            <div class="col-sm-3">
            <input  name="articulo" type="text"  class="form-control" size=40 style="width:500px"  placeholder="Ingrese Articulo">
            </div>          
         </div>
         <br>  
         <div class="form-row">
                
            <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u> Observaciones </u> </b></label>
            <div class="col-sm-3">
            <input  name="observacionesN" type="text"  class="form-control"  size=40 style="width:500px" placeholder="Ingrese observaciones">
            </div>        
         </div> 
         <button type="submit" class="btn btn-dark" onclick= "return confirm (' Percatarse de no tener errores antes de guardar')" >Guardar</button> 
         <br>
         <a href="{{route('liquidacion.altabajados.Veraltabajados',$colegio_id )}}" target="blank" class="btn btn-secondary">Ver en  PDF PLANILLA OTRA NOVEDAD</a>
         <br><BR>
         
         
       
   
<table class="table table-bordered " id="tablaAltaBaja" >
   <thead class="thead-dark">
           <tr >
           <th colspan="4"></th>
           <th colspan="1" class="text-right-align">Grado</th>
           <th colspan="3" class="text-center-align">Servicios en el mes</th>
           
           <th colspan="2"></th>
           <th colspan="1"></th>
           </tr>
           <tr>
           <th scope="col">D.N.I</th>
           <th scope="col" style="width : 20%;"> Apellido y Nombres</p></th>
           <th scope="col">Cargo</th>
           <th scope="col">Carácter</th>
           <th scope="col">Sección</th>
           <th scope="col" style="width : 20%;"> Desde</th>
           <th scope="col" style="width : 20%;"> Hasta</th>
           <th scope="col">Total</th>
           <th scope="col" style="width : 20%;"> Motivo</p></th>
           <th scope="col" style="width : 20%;"> Observaciones</p></th>
           <th scope="col"> OPCION </th>
           
           </tr>
   </thead>
   
   <tbody>
           
          @foreach ($altabaja as $item)
          
          <tr>
           <td><p style="font-size: 80%; text-align:center">{{$item->dni}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->ApellidoNommbre}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->Cargo}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->Caracter}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->GradoSeccion}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->desdeN}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->hastaN}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->totalN}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->articulo}}</p></td>
           <td><p style="font-size: 80%; text-align:center">{{$item->observacionesN}}</p></td>
         <td>
            <form action="{{ route('liquidacion.altabaja.eliminar',$item->id)}}" method="post">
               @csrf 
               <button type="submit" ONCLICK="return confirm ('¿Esta seguro que desea borrar?');" sclass=" btn btn-danger">
                  <i class="fa fa-trash"></i>eliminar
               </button>   
            </form>
         </td>

    </tr>
           
          @endforeach
   </tbody>
  
   </table>  
   

@endsection
