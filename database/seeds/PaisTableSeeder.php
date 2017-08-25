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
        Pais::create([
            'nome' => 'Brasil',
            'nome_completo' => 'República Federativa do Brasil',
            'iso' => 'BRA',
            'adjeto_patrio' => 'Brasileiro',
            'codigo_telefone' => '55',
        ]);
    }
}
