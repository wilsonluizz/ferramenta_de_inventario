<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsavel extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $table = 'responsaveis';

    protected $fillable = ['id','nome', 'cpf', 'rg', 'telefone', 'email'];   

    public function localidade(){
        return $this->belongsTo('App\Models\Localidade', 'responsavel_id');
    }

}
