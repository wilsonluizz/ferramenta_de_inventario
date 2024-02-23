<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// FIXME: REMOVER DE PRODUÇÃO
use Illuminate\Database\Eloquent\Factories\HasFactory;  

class Localidade extends Model
{
    use SoftDeletes;

    // FIXME: REMOVER DE PRODUÇÃO
    use HasFactory;
    protected $fillable = [
        'titulo', 
        'cep', 
        'logradouro', 
        'numero', 
        'complemento', 
        'bairro', 
        'cidade', 
        'uf', 
        'latitude', 
        'longitude', 
        'localidade_tipo_id',
        // 'responsavel_id',
    ];

    public function equipamentos() {
        return $this->hasMany(Equipamento::class, 'localidade_id');
    }

    public function localidadeTipo() {
        return $this->belongsTo(LocalidadeTipo::class);
    }

    public function responsavel(){
        return $this->hasOne('App\Models\Responsavel', 'responsavel_id');
    }
}
