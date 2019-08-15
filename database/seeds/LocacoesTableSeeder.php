<?php

use Illuminate\Database\Seeder;
use App\Locacao;

class LocacoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locacao = new Locacao;
        $locacao->cliente_id = '1';
        $locacao->dataLocacao = '10/08/2019';
        $locacao->dataEntrega = '15/08/2019';
        $locacao->valor = '300.00';
        $locacao->save();

        $locacao = new Locacao;
        $locacao->cliente_id = '2';
        $locacao->dataLocacao = '11/08/2019';
        $locacao->dataEntrega = '21/08/2019';
        $locacao->valor = '455.00';
        $locacao->save();

        $locacao = new Locacao;
        $locacao->cliente_id = '3';
        $locacao->dataLocacao = '12/08/2019';
        $locacao->dataEntrega = '12/08/2019';
        $locacao->valor = '55.00';
        $locacao->save();
    }
}
