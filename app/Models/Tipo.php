<?php

/**
 *  CLASSE "TIPO" DEFINE UM TIPO DE EQUIPAMENTO: DESKTOP, NOTEBOOK, CELULAR, WEBCAM, ENTRE OUTROS
 *  
 *  @param categoria
 *  CADA TIPO DE EQUIPAMENTO POSSUI UMA CATEGORIA CONTÁBIL. POR SUA VEZ, CADA CATEGORIA POSSUI UMA CONTA CONTABIL ASSOCIADA
 *  Exemplos:
 *      Tipo        >>      Categoria       >>      ContabilConta 
 *      Notebook    >>      Informática e   >>      40425 - Equipamentos PROADI
 *                          softwares
 *      Webcam      >>      Periféricos     >>      40425 - Equipamentos PROADI
 */                         

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipo extends Model
{
    use SoftDeletes;

    public function categoria() {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function equipamento(){
        return $this->hasMany('App\Models\Equipamento');
    }
}
