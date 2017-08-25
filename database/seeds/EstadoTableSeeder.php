<?php

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estado::create([
            'pais_id' => '1',
            'sigla' => 'DF',
            'nome' => 'Distrito Federal',
            'regiao' => 'Centro-oeste',
            'codigo_telefone' => '61',
        ]);


    }
}
