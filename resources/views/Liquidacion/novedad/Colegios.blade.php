@extends('layouts.app')
@section('content')
<div class="container">
   <!-- <div class="row justify-content-center">-->
        <div class="col-md-20">
<br><br>

<form method="POST" action="{{ route('Liquidacion.novedad.Colegios') }}" >
        @csrf
        
        <br>
        <!--TABLA ALTAS Y BAJAS-->

        <div class="card">
        <div class="form-group col-md-4">
                        <label for="inputState">ELIJA UNA PLANILLA</label>
                        <select id="inputState" name="inputState" class="form-control">
                          <option value ="ALTA Y BAJA"selected>ALTA Y BAJA</option>
                          <option value ="NOVEDAD">NOVEDAD</option>
                          <option value = " OTRAS NOVEDADES">OTRAS NOVEDADES</option>
                        </select>
        </div>
        <div class="card-header"><b>Ingrese datos de la Institución </b>
                        </div>
                        <br>
                        <div class="form-row" >
                
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Número</b></u></label>
                <div class="col-sm-3">
                <input  name="cod_escuela" type="number" min="0"  class="form-control"   placeholder="Ingrese número de la institución">
                </div>
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Institución</b></u></label>
                <div class="col-sm-3">
                <input  name="Institucion" type="text"  class="form-control"   placeholder="Ingrese nombre de la institución">
                </div>
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>ctg</b></u></label>
                <div class="col-sm-3">
                <input  name="ctg" type="text"  class="form-control"   placeholder="Ingrese localidad de la institución">
                </div>
        </div>
        <br>
        <div class="form-row">
                
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Turno</b></u></label>
                <div class="col-sm-3">
                <input  name="turno" type="text"  class="form-control"   placeholder="Ingrese turno de la institución">
                </div>
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Domicilio</b></u></label>
                <div class="col-sm-3">
                <input  name="domicilio" type="text"  class="form-control"   placeholder="Ingrese domicilio de la institución">
                </div>
        </div>
        <br>
        <div class="form-row">
                
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Teléfono</b></u></label>
                <div class="col-sm-3">
                <input name="telefono" type="number" min="0"  class="form-control"   placeholder="Ingrese teléfono de la institución">
                </div>
                <label style="text-align:center" for="staticEmail" class="col-sm-1 col-form-label"><b><u>Localidad</b></u></label>
                <div class="col-sm-3">
                <input  name="localidad" type="text"  class="form-control"   placeholder="Ingrese localidad de la institución">
                </div>
        </div>
        <br>
        <div class="form-row">
                
                <label style="text-align:center" for="staticEmail" class="col-sm-2 col-form-label"><b><u>Departamento</b></u></label>
                <div class="col-sm-3">
                <input name="departamento" type="text"  class="form-control"   placeholder="Ingrese depto de la institución">
                </div>
                <label style="text-align:center" for="staticEmail" class="col-sm-2 col-form-label"><b><u>Codigo de Autenticacion</b></u></label>
                <div class="col-sm-3">
                <input name="codAutenticacion" type="text"  class="form-control"   placeholder="Ingrese depto de la institución">
                </div>
                
                
        </div>  
        <button type="submit" class="btn btn-dark">Guardar</button>
</form>        
    