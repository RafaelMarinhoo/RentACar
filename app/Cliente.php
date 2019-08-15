<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'cpf',
        'endereco'
    ];

    public function locacoes()
    {
        return $this->hasMany('App\Locacao');
    }
}
