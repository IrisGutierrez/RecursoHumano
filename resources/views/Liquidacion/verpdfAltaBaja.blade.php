<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PLANILLA DE ALTA Y BAJAS</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/estiloPDF.css')}}">
</head>
<body>
<?php
 
set_time_limit(180);
 

?>

<div class="header">
<table class="border">
        <tr>     
          <td width="150" rowspan="2"><img src="almacenamiento/Ministerio.jpg" width="100" height="100">  </td>   
          <td WIDTH="100">
               <H5  style="text-align: right">PLANILLA DE ALTAS Y BAJAS</H5>
               </td>   
                
        </tr>
        <tr>     
          
          <td WIDTH="100">
               <H7  style="text-align: right"><B>LIQUIDACIÓN / ÁREA DE RECURSOS HUMANOS</B></H7>
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
                                <th scope="col">N°</th>
                                <th scope="col">D.N.I</th>
                                <th scope="col" style='width: 20%;'>Apellido y Nombres</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Carácter</th>
                                <th scope="col">Sección</th>
                                <th scope="col"style='width: 11%;'>Desde</th>
                                <th scope="col"style='width: 11%;'>Hasta</th>
                                <th scope="col">Total</th>
                                <th scope="col" style='width: 10%;'>Motivo</th>
                                <th scope="col" style='width: 10%;' >Observaciones</th>
                                
                                </tr>
  </thead>
  <tbody>
  @foreach ($altabaja ?? '' as $item)

<tr>
<th scope="row">{{$item->num}}</th>
<td>{{$item->dni}}</td>
<td>{{$item->ApellidoNombre}}</td>
<td>{{$item->cargo}}</td>
<td>{{$item->caracter}}</td>
<td>{{$item->GradoSeccion}}</td>
<td>{{$item->Desde}}</td>
<td>{{$item->Hasta}}</td>
<td>{{$item->Total}}</td>
<td style='width: 10%;'>{{$item->Motivo}}</td>
<td style='width: 10%;'>{{$item->Observaciones}}</td>

</tr>
@endforeach
        
  </tbody>
</table>

</body>
</html>