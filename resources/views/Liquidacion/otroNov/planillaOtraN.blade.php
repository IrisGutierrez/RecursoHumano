
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

        <title>Planilla Otras Novedades</title>
        
</head>
<body>


<div class="container" style="min-width: 2700px">
<br>

<form action="{{ url('/filtrar') }}">
<button type="submit" class="btn btn-outline-primary">Volver</button></form>

        <br>   
        <div class="card">
                        <div class="card-header" style="width:2700px"> <b>Planilla de Otras Novedades </b>
                        </div></div>
                     <!--   <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{route('liquidacion.verpdfAltaBaja')}}" target="blank" class="btn btn-secondary">Ver PDF</a>
        <a href="{{route('liquidacion.descargarpdfAltaBaja')}}" class="btn btn-secondary">Descargar PDF</a>
        
</div>     -->

                
        
        <br>
        
        <table class="table table-striped table-bordered"  id="tablaOtraNov" >        
        <thead class="thead-dark" style='text-align:center;'>
                                <tr >
                                <th colspan="6"></th>
                                <th colspan="1" class="text-right-align">Grado</th>
                                <th colspan="3" class="text-center-align">Servicios en el mes</th>
                                
                                <th colspan="2"></th>
                                </tr>
                                <tr>
                                <th scope="col">N°</th>
                                
                                
                                <th scope="col" style='width: 20%;'>Apellido y Nombres</th>
                                <th scope="col">D.N.I</th>
                                <th scope="col">Cargo</th>
                                <th scope="col">Carácter</th>
                                <th scope="col">Sección</th>
                                <th scope="col">Desde</th>
                                <th scope="col">Hasta</th>
                                <th scope="col">Total</th>
                                <th scope="col" style='width: 20%;'>Motivo</th>
                                <th scope="col"  >Observaciones</th>
                                <th scope="col">Institución</th>
                                
                                </tr>
                                <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($filtro as $item)
                        <tr>
                        <td>{{$item->num}}</td>
                        
                        <td>{{$item->ApellidoNommbre}}</td>
                        <td>{{$item->dni}}</td>
                        <td>{{$item->Cargo}}</td>
                        <td>{{$item->Caracter}}</td>
                        <td>{{$item->GradoSeccion}}</td>
                        <td>{{$item->desdeN}}</td>
                        <td>{{$item->hastaN}}</td>
                        <td>{{$item->totalN}}</td>
                        <td>{{$item->articulo}}</td>
                        <td>{{$item->observacionesN}}</td>
                        <td>{{$item->colegio_id}}</td>
                        </tr>
                       
                        @endforeach
                        
                      
                        </tbody>
    </table>
                        </div>
                        <br>
                        
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    
        <script >
  
        $(document).ready(function() {
        var table= $('#tablaOtraNov').DataTable({
                orderCellsTop: true,
           fixedHeader: true
        });
         //$('#tablaAltaBaja thead tr').clone(true).appendTo('#tablaAltaBaja thead');
$('#tablaOtraNov thead tr:eq(2) th').each(function(i){
        var title = $(this).text();//es el nombre de la columna
        $(this).html('<input type="text" placeholder="Buscar..." >');

        $('input',this).on('keyup change', function(){
                if (table.column(i).search()!==this.value){
                        table 
                                .column(i)
                                .search(this.value)
                                .draw();
                }
        });
});
} );
      
</script>        
        </div></div>
       
        </body>
</html>
