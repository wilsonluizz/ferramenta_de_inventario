<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimentacao extends Model
{
    protected $table = 'movimentacoes';

    protected $fillable = [
        'motivo_movimentacao', 'equipamento_id', 'responsavel_id', 'tipo_mov_id'
    ];

    // public function equipamento(){
    //     return $this->hasMany('App\Models\Equipamento', 'equipamento_id');
    // }

    public function tipoMovimentacao(){
        return $this->belongsTo('App\Models\TipoMovimentacao', 'tipo_mov_id');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\User', 'responsavel_id');
    }
    
}
