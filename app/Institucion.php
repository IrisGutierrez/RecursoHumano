<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Novedad;
use App\Altabaja;
use App\Otranovedad;
class Institucion extends Model
{
    protected $table = 'Institucions';
    protected $fillable = [
        'num','cod_escuela', 'Institucion', 'ctg', 'turno', 'domicilio', 'telefono', 'localidad', 'departamento','codAutenticacion'
    ];

    protected $primaryKey='id';
    /*public function docentes()
    {
        return $this->belongsToMany('App\Docente','clave_foranea','institucion_id','docente_id');
    }*/

   
    public function otranovedades()
    {
        return $this->hasMany('App\Otranovedad','id','colegio_id');
    }
    public function altaba()
    {
        return $this->hasMany('App\Altabaja','id','colegio_id');
    }
    public function novedad()
    {
        return $this->hasMany('App\Novedad','id','colegio_id');
    }
}
