<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

// FIXME: REMOVER DE PRODUÇÃO
use Illuminate\Database\Eloquent\Factories\HasFactory;  

class Equipamento extends Model
{
    use SoftDeletes;

    // FIXME: REMOVER DE PRODUÇÃO
    use HasFactory;
    
    protected $fillable = [
        'titulo', 
        'descricao', 
        'valor_equipamento',
        'numero_serie', 
        'patrimonio',
        'centro_de_custo_id', 
        'tipo_id', 
        'marca_id',
        'nota_fiscal_id', 
    ];
    

    public function localidade(){
        return $this->belongsTo('App\Models\Localidade', 'localidade_id');
    }

    public function centroDeCusto(){
        return $this->belongsTo('App\Models\CentroDeCusto', 'centro_de_custo_id');
    }
    

    public function marca(){
        return $this->belongsTo('App\Models\Marca', 'marca_id');
    }

    public function notaFiscal(){
        return $this->belongsTo('App\Models\NotaFiscal', 'nota_fiphscal_id');
    }

    public function responsavel(){

        return $this->belongsTo('App\Models\Responsavel', 'responsavel_id');

    }

    public function tipo(){
        return $this->belongsTo('App\Models\Tipo');
    }

    public function movimentacao(){
        return $this->hasMany('App\Models\Movimentacao', 'equipamento_id');
    }

    public function historico(){
        return $this->hasMany('App\Models\HistoricoEquipamento', 'equipamento_id');
    }

    

    

    
}
