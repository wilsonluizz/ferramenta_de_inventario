<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    public function tipo(){
        return $this->hasOne('App\Models\Tipo');
    }

    public function contabilConta() {
        return $this->belongsTo('App\Models\ContabilConta');
    }
}
