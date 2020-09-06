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
<a href="{{ url('/indexliq') }}" class="btn btn-outline-primary">Volver</a>
<br><br>
<!--DATOS INSTITUCION-->
<div class="card">
              
            
                <div class="card-header">{{ __('Ingrese los datos de la institución') }}
                
                </div>
</div>
<br>
<!--
    <form>
    
    <div class="form-group row">
        <label for="nombreesc" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>
            <div class="btn-group col-md-5 ">
        <select id="nombreesc" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false" class="form-control @error('nombreesc') is-invalid @enderror" name="nombreesc"  required autocomplete="nombreesc">
            Left-aligned but right aligned when large screen
        <option value="">Escoja una institución</option>
       
        <div class="dropdown-menu dropdown-menu-lg-right">
            <option class="dropdown-item" type="button" value=""></option>
            
        </div>
        
        
        </select>
        </div>
        

       

            @error('nombreesc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="categoria" class="col-md-3 col-form-label text-md-right">{{ __('Categoria') }}</label>
        
        <div class="col-md-3">
            <input id="categoria" type="text" min="0" class="form-control @error('categoria') is-invalid @enderror" name="categoria" value="" required autocomplete="categoria" autofocus>

            @error('categoria')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <label for="turno" class="col-md-1 col-form-label text-md-right">{{ __('Turno') }}</label>
        
        <div class="col-md-3">
            <input id="turno" type="text" min="0" class="form-control @error('turno') is-invalid @enderror" name="turno" value="" required autocomplete="turno" autofocus>

            @error('turno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>  
             
    </div>
    <div class="form-group row">
    <label for="domicilio" class="col-md-3 col-form-label text-md-right">{{ __('Domicilio') }}</label>
    
        <div class="col-md-3">
            <input id="domicilio" type="text" min="0" class="form-control @error('domicilio') is-invalid @enderror" name="domicilio" value="" required autocomplete="domicilio" autofocus>

            @error('domicilio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <label for="telefono" class="col-md-1 col-form-label text-md-right">{{ __('Teléfono') }}</label>

        <div class="col-md-3">
            <input id="telefono" type="text" min="0" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="" required autocomplete="telefono" autofocus>

            @error('telefono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        </div>
        <div class="form-group row">
            <label for="localidad" class="col-md-3 col-form-label text-md-right">{{ __('Localidad') }}</label>

            <div class="col-md-3">
                <input id="localidad" type="text" min="0" class="form-control @error('localidad') is-invalid @enderror" name="localidad" value="" required autocomplete="localidad" autofocus>

                @error('localidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label for="departamento" class="col-md-1 col-form-label text-md-right">{{ __('Depto.') }}</label>

            <div class="col-md-3">
                <input id="departamento" type="text" min="0" class="form-control @error('departamento') is-invalid @enderror" name="departamento" value="" required autocomplete="departamento" autofocus>

                @error('departamento')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>   

    </div>
  <br>
  <div style="text-align: center;" >
  <button type="button"  class="btn btn-primary">Listo</button>
  </div>
</form>-->
<br>
<!--TABLA ALTAS Y BAJAS-->
<div class="card">
              
            
                <div class="card-header">{{ __('Planilla de Altas y Bajas') }}
                
                </div>
</div>
         <br>       
<table class="table table-bordered " >
                    <thead class="table-dark">
                        <tr>
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
                    
                    @foreach ($altabaja as $item)
                        <tr>   
                        <th scope="row">1</th>
                        <td >{{$item->Dni}}</td>
                        <td >{{$item->ApellidoNombre}}</td>
                        <td>{{$item->Cargo}}</td>
                        <td>{{$item->Caracter}}</td>
                        <td>{{$item->GradoSeccion}}</td>
                     
                        <td>{{$item->desdeAB}}</td>
                        <td>{{$item->hastaAB}}</td>
                        <td>{{$item->totalAB}}</td>
                        <td >{{$item->motivo}}</td>
                        <td >{{$item->observacionesAB}}</td>
                        
                        </tr>
                    @endforeach    
                    </tbody>
                    </table>
                </div>
</div>
@endsection