<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotaFiscal extends Model
{
    use SoftDeletes;
    
    protected $table = 'notas_fiscais';
    protected $fillable = ['numero','valor', 'sc_origem', 'data_emissao'];

    public function equipamento(){
        return $this->belongsTo('App\Models\Equipamento', 'nota_fiscal_id');
    }

    protected $dates = ['data_emissao'];
}
