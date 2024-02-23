<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CentroDeCusto extends Model
{
    use SoftDeletes;

    protected $fillable = ['nome', 'codigo'];


    public function equipamento() {
        return $this->hasMany('App\Models\Equipamento', 'centro_de_custo_id');
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'cc_users', 'centro_de_custo_id', 'user_id');
    }   
}