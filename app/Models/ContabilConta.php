<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContabilConta extends Model
{
    use SoftDeletes;

    public function categoria(){
        return $this->belongsTo('App\Models\Categoria', 'categoria_id');
    }
}
