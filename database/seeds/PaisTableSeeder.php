<?php

use App\Models\Pais;
use Illuminate\Database\Seeder;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::clear();

        Pais::create([
            'nome' => 'Sem País',
            'nome_completo' => 'Sem país',
            'iso' => 'S/N',
            'adjetivo_patrio' => 'Sem País',
            'codigo_telefone' => 'Sem número',
        ]);

        Pais::create([
            'nome' => 'Brasil',
            'nome_completo' => 'República Federativa do Brasil',
            'iso' => 'BRA',
            'adjetivo_patrio' => 'Brasileiro',
            'codigo_telefone' => '55',
        ]);

        Pais::create([
            'nome' => 'Estados Unidos',
            'nome_completo' => 'Estados Unidos da América',
            'iso' => 'US',
            'adjetivo_patrio' => 'Americano',
            'codigo_telefone' => '16',
        ]);
    }
}
