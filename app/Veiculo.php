<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'id',
        'modelo',
        'fabricante',
        'placa'
    ];

    public function locacoes()
    {
        return $this->belongsTo('App\Locacao');
    }
}
