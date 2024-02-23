<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoEquipamento extends Model
{
    protected $fillable = ['atividade_id', 'equipamento_id', 'responsavel_id'];

    public function atividade(){
        return $this->belongsTo('App\Models\Atividade', 'atividade_id');
    }
    
    public function equipamento(){
        return $this->belongsTo('App\Models\Equipamento', 'equipamento_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'responsavel_id');
    }
}
