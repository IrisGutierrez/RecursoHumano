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

<form method="POST" action="{{ route('liquidacion.altaybajapost') }}" >
        @csrf
        
        <br>
        <!--TABLA ALTAS Y BAJAS-->

        <br>   
        <div class="card">
                        <div class="card-header"> <b>Planilla de Altas y Bajas </b>
                        <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{route('liquidacion.verpdfAltaBaja')}}" target="blank" class="btn btn-secondary">Ver PDF</a>
        <a href="{{route('liquidacion.descargarpdfAltaBaja')}}" class="btn btn-secondary">Descargar PDF</a>
        
</div>     
</div>     
  
                        
                        </div>
                
                        
        </div>
        <br>
        
                @if(session('mensaje1'))

<div class="alert alert-success" role="alert">{{ session('mensaje1') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

</div>
<br>
@endif

@if(session()->has('mensaje'))
<div class="alert alert-danger" role="alert">{{ session('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

</div>
<br>
@endif   
  
        <table class="table table-bordered " id="tablaAltaBaja" >
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
                                <th scope="col">Desde</th>
                                <th scope="col">Hasta</th>
                                <th scope="col">Total</th>
                                <th scope="col" style='width: 20%;'>Motivo</th>
                                <th scope="col"  >Observaciones</th>
                                
                                </tr>
                        </thead>
                        
                        <tbody>
                               
                               
                                <tr>
                                <td><input type="number" min="0" style="width : 30px; heigth : 100px" name=num></td>
                                <td><input type="hidder" min="0" value="{{$colegio_id}}" style="width : 30px; heigth : 100px" name="colegio_id" ></td>

                                <td><input type="number" min="0" style="width : 70px; height: 30px; font-size: 60%;" name=dni></td>
                                <td><input type="text" style="width : 100px; heigth : 100px; font-size: 60%;" name=ApellidoNombre></td>
                                <td><input type="text" style="width : 50px; heigth : 100px; font-size: 60%;" name=cargo></td>
                                <td><input type="text" style="width : 50px; heigth : 100px; font-size: 60%;" name=caracter></td>
                                <td><input type="text" style="width : 50px; heigth : 100px; font-size: 60%;" name=GradoSeccion></td>
                                <td><input type="date" style="width : 100px; heigth : 100px; font-size: 60%;" name=Desde></td>
                                <td><input type="date" style="width : 100px; height: 20px; font-size: 60%;" name=Hasta></td>
                                <td><input type="number" min="0" style="width : 30px; heigth : 100px; " name=Total></td>
                                <td><input type="text" style="width : 100px; heigth : 100px; font-size: 60%;" name=Motivo></td>
                                <td><input type="text" style="width : 80px; heigth : 100px; font-size: 60%;" name=Observaciones></td>
                                
                                </tr>
                        </tbody>
                        
                        </table>
                        </div>
                        <br>
                        <div class="form-group row">
                        <div class="col-sm-12" style="text-align:center">
                        <button name="count_click" type="button" class="btn btn-primary mr-2"  onclick="agregarFila()">Agregar Fila</button>
                        <button name="count_click" type="button" class="btn btn-primary mr-2" onclick="eliminar()">Eliminar Fila</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                           
                </div>
                </div>
                </form>
        <script type="text/javascript">
        /* Variables de Configuracion */
        var idCanvas='canvas';
        var idForm='formCanvas';
        var inputImagen='imagen';
        var estiloDelCursor='crosshair';
        var colorDelTrazo='##000000';
        var colorDeFondo='#fff';
        var grosorDelTrazo=2;
        /* Variables necesarias */
        var contexto=null;
        var valX=0;
        var valY=0;
        var flag=false;
        var imagen=document.getElementById(inputImagen); 
        var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
        var altoCanvas=document.getElementById(idCanvas).offsetHeight;
        var pizarraCanvas=document.getElementById(idCanvas);
        /* Esperamos el evento load */
        window.addEventListener('load',IniciarDibujo,false);
        function IniciarDibujo(){
                /* Creamos la pizarra */
                pizarraCanvas.style.cursor=estiloDelCursor;
                contexto=pizarraCanvas.getContext('2d');
                contexto.fillStyle=colorDeFondo;
                contexto.fillRect(0,0,anchoCanvas,altoCanvas);
                contexto.strokeStyle=colorDelTrazo;
                contexto.lineWidth=grosorDelTrazo;
                contexto.lineJoin='round';
                contexto.lineCap='round';
                /* Capturamos los diferentes eventos */
                pizarraCanvas.addEventListener('mousedown',MouseDown,false);// Click pc
                pizarraCanvas.addEventListener('mouseup',MouseUp,false);// fin click pc
                pizarraCanvas.addEventListener('mousemove',MouseMove,false);// arrastrar pc
                pizarraCanvas.addEventListener('touchstart',TouchStart,false);// tocar pantalla tactil
                pizarraCanvas.addEventListener('touchmove',TouchMove,false);// arrastras pantalla tactil
                pizarraCanvas.addEventListener('touchend',TouchEnd,false);// fin tocar pantalla dentro de la pizarra
                pizarraCanvas.addEventListener('touchleave',TouchEnd,false);// fin tocar pantalla fuera de la pizarra
        }
        function MouseDown(e){
                flag=true;
                contexto.beginPath();
                valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
                contexto.moveTo(valX,valY);
        }
        function MouseUp(e){
                contexto.closePath();
                flag=false;
        }
        function MouseMove(e){
                if(flag){
                contexto.beginPath();
                contexto.moveTo(valX,valY);
                valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
                contexto.lineTo(valX,valY);
                contexto.closePath();
                contexto.stroke();
                }
        }
        function TouchMove(e){
                e.preventDefault();
                if (e.targetTouches.length == 1) { 
                var touch = e.targetTouches[0]; 
                MouseMove(touch);
                }
        }
        function TouchStart(e){
                if (e.targetTouches.length == 1) { 
                var touch = e.targetTouches[0]; 
                MouseDown(touch);
                }
        }
        function TouchEnd(e){
                if (e.targetTouches.length == 1) { 
                var touch = e.targetTouches[0]; 
                MouseUp(touch);
                }
        }
        function posicionY(obj) {
                var valor = obj.offsetTop;
                if (obj.offsetParent) valor += posicionY(obj.offsetParent);
                return valor;
        }
        function posicionX(obj) {
                var valor = obj.offsetLeft;
                if (obj.offsetParent) valor += posicionX(obj.offsetParent);
                return valor;
        }
        /* Limpiar pizarra */
        function LimpiarTrazado(){
                contexto=document.getElementById(idCanvas).getContext('2d');
                contexto.fillStyle=colorDeFondo;
                contexto.fillRect(0,0,anchoCanvas,altoCanvas);
        }
        /* Enviar el trazado */
        function GuardarTrazado(){
               // imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
                document.forms[idForm].submit();
        }
        </script>
        <script> 
        var i = 1
        function agregarFila() {
        var m = i++;
        document.getElementById("tablaAltaBaja").insertRow(-1).innerHTML = '<td><input type="number" min="0" style="width : 30px; heigth : 100px" name=num'+m+' value='+m+'></td>'
                                                                                +'<td><input type="number" min="0" style="width : 70px; height: 30px; font-size: 60%;" name=dni'+m+'value="99.999.999"></td>'
                                                                                +'<td><input type="text" style="width : 100px; heigth : 100px; font-size: 60%;" name=ApellidoNombre'+m+' value="Juan Perez"></td>'
                                                                                +'<td><input type="text" style="width : 50px; heigth : 100px; font-size: 60%;" name=cargo'+m+'value="D02"></td>'
                                                                                +'<td><input type="text" style="width : 50px; heigth : 100px; font-size: 60%;" name=caracter'+m+'value="T / I / S / V"></td>'
                                                                                +'<td><input type="text" style="width : 50px; heigth : 100px; font-size: 60%;" name=GradoSeccion'+m+'value="4 G"></td>'
                                                                                +'<td><input type="date" style="width : 100px; heigth : 100px; font-size: 60%;" name=Desde'+m+'></td>'
                                                                                +'<td><input type="date" style="width : 100px; height: 20px; font-size: 60%;" name=Hasta'+m+'></td>'
                                                                                +'<td><input type="number" min="0" style="width : 30px; heigth : 100px; " name=Total'+m+'></td>'
                                                                                +'<td><input type="text" style="width : 100px; heigth : 100px; font-size: 60%;" name=Motivo'+m+'value="BAJA por culminación de licencia de la Prof. María Reynoso"></td>'
                                                                                +'<td><input type="text" style="width : 80px; heigth : 100px; font-size: 60%;" name=Observaciones'+m+'value="---"></td>'
                                                                        
                                                                                var filas=document.getElementById("tablaAltaBaja").getElementsByTagName("tr");
                for(var i=0; i<filas.length; i++) {
                    filas[i].onclick=onclickHandler;
                }                                                                                                                                 
                                                                                
        }
        

        var seleccionado=null; //contiene la fila seleccionada
        function onclickHandler() {
                        if(seleccionado==this) {
                            this.style.backgroundColor="transparent";
                            seleccionado=null;
                        }
                        else {
                            if(seleccionado!=null) 
                                seleccionado.style.backgroundColor="transparent";
                            this.style.backgroundColor="#92a8d1";
                            seleccionado=this;
                        }
                        
        }
                
                var filas=document.getElementById("tablaAltaBaja").getElementsByTagName("tr");
                for(var i=0; i<filas.length; i++) {
                    filas[i].onclick=onclickHandler;
                }
               
    tr.onclick=onclickHandler;
    document.getElementById("tablaAltaBaja").appendChild(TR);

function eliminar() {
    if(seleccionado==null) return alert("Seleccione una fila haciendo click sobre ella");
    seleccionado.parentNode.removeChild(seleccionado);

}

</script> 
<script>
        
</script>        
        </div>

@endsection