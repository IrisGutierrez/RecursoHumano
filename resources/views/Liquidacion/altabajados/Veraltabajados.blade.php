<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PLANILLA DE NOVEDAD</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/estiloPDF.css')}}">
</head>
<body>
<?php
 
set_time_limit(180);
 

?>
<div class="">
<table class="table table-bordered">
  <thead class="thead-dark">
    <tbody>
      @foreach ($altados as $item)
      <tr>
                                  
        <th  colspan="3" class="text-right-align" >INSTITUCION/NOMRE:{{$item->Institucion}}</th>
        <th  colspan="2" class="text-right-align">LOCALIDAD : {{$item->localidad}}</th>
      </tr>
        <th scope="col" >CTG : {{$item->ctg}}</th>
        <th scope="col" >TELEFONO : {{$item->telefono}}</th>
        <th scope="col" >TURNO :{{$item->turno}}</th>
        <th scope="col" >DOMICILIO : {{$item->domicilio}}</p>
        <th scope="col">DEPARTAMENTO : {{$item->departamento}}</th>
      </tr>
  </thead>
    @endforeach     
  </tbody>
</table>
 

  <table class="justify">

  
        <tr>      
          <td WIDTH="100">
               <P style="text-align: right">PLANILLA OTRA NOVEDAD</P>
          </td>    
        </tr>
        <tr> 
        <td WIDTH="100">
            <p  style="text-align: right"><B>LIQUIDACIÓN / ÁREA DE RECURSOS HUMANOS</B></p>
        </td>     
        </tr>      
  </table>
<br>
</div>
              

  <table class="table table-bordered">
  <thead class="thead-dark">
                             <tr >
                                <th colspan="5"></th>
                                <th colspan="1" class="text-right-align">Grado</th>
                                <th colspan="3" class="text-center-align">Servicios en el mes</th>
                                <th colspan="2"></th>
                              </tr>
                              <tr>
                                
                                <th scope="col"style='width: 20%;'>D.N.I</th>
                                <th scope="col" style='width: 20%;'>Apellido y Nombres</th>
                                <th scope="col" style='width: 10%;'>Cargo</th>
                                <th scope="col" style='width: 10%;'>Carácter</th>
                                <th scope="col" style='width: 10%;'>Sección</th>
                                <th scope="col"style='width: 10%;'>Desde</th>
                                <th scope="col"style='width: 10%;'>Hasta</th>
                                <th scope="col" style='width: 10%;'>Total</th>
                                <th scope="col" style='width: 30%;'>Motivo</th>
                                <th scope="col" style='width: 50%;' >Observaciones</th>
                                
                               </tr>
</thead>
  <tbody>
  @foreach ($altabaja as $item)
  
<tr>
  
<td><p style="font-size:75%; text-align:center">{{$item->dni}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->ApellidoNommbre}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->Cargo}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->Caracter}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->GradoSeccion}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->desdeN}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->hastaN}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->totalN}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->articulo}}</td>
<td><p style="font-size:75%; text-align:center">{{$item->observacionesN}}</p></td>


</tr>
@endforeach
        
  </tbody>
</table>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tbody>
      @foreach ($altados as $item)
                                <tr>
                                  <th scope="col">CODIGO DE AUTENTICACION: {{$item->codAutenticacion}}</th>
                                </tr>
  </thead>
    @endforeach     
  </tbody>
</table>
</body>
</html>