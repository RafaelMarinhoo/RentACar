<?php

use App\Veiculo;
use Illuminate\Database\Seeder;

class VeiculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $veiculos = new Veiculo;
        $veiculos->modelo = 'Civic';
        $veiculos->fabricante = 'Honda';
        $veiculos->placa = 'OXO-1234';
        $veiculos->save();

        $veiculos = new Veiculo;
        $veiculos->modelo = 'Uno';
        $veiculos->fabricante = 'Fiat';
        $veiculos->placa = 'KML-8139';
        $veiculos->save();

        $veiculos = new Veiculo;
        $veiculos->modelo = 'Prisma';
        $veiculos->fabricante = 'Chevrolet';
        $veiculos->placa = 'MNM-1051';
        $veiculos->save();
    }
}