<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $table = 'locacoes';

    protected $fillable = [
        'id',
        'dataLocacao',
        'dataEntrega',
        'valor'
    ];

    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function veiculos()
    {
        return $this->hasOne('App\Veiculo');
    }

}
