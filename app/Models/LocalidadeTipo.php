<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class LocalidadeTipo extends Model
{
    use SoftDeletes;

    public function localidade() {
        return $this->hasOne(Localidade::class,'localidade_tipo_id');
    }
}