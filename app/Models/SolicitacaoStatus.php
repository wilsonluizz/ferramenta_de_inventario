<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoStatus extends Model
{
    protected $table = 'solicitacao_status';
    protected $fillable = ['status'];

    public function solicitacao(){
        return $this->hasMany('App\Models\SolicitacaoEmprestimo', 'status_id');
    }

}
