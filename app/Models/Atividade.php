<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{

    protected $table = 'atividades';

    public function historico(){
        return $this->hasMany('App\Models\HistoricoEquipamento', 'atividade_id');
    }
}
