<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoEmprestimo extends Model
{
    protected $table = 'solicitacao_emprestimos';
    protected $fillable = ['client_solicitante_id', 'equipamento_gen_id','status_id', 'validacao'];

    public function equipamentosGenericos()
    {
        return $this->hasOne('App\Models\EquipamentoGenerico','id','equipamento_gen_id');
    }

    public function usuario(){
        return $this->belongsTo('App\Models\user', 'client_solicitante_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\SolicitacaoStatus', 'status_id');
    }

}
