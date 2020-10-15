<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Institucion;

class Otranovedad extends Model
{
    protected $table = 'otranovedads';
    protected $fillable = [
        'id','colegio_id', 'dni', 'ApellidoNommbre', 'Cargo', 'Caracter', 'GradoSeccion', 'desdeN', 'hastaN','totalN','articulo','observacionesN'
    ];
    protected $primaryKey='id';

    
    public function institucion()
    {
      return $this->belongsTo('App\Institucion','id');
    }
}
