<?php

use Illuminate\Database\Seeder;

class TipoVinculoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TipoVinculo::clear();


        \App\Models\TipoVinculo::create([
            'codigo' => 's-com-vinculo',
            'descricao' => 'Servidor Com Vínculo',
        ]);

        \App\Models\TipoVinculo::create([
            'codigo' => 's-sem-vinculo',
            'descricao' => 'Servidor Sem Vínculo',
        ]);

        \App\Models\TipoVinculo::create([
            'codigo' => 'terceirizado',
            'descricao' => 'Funcionário Terceirizado',
        ]);

        \App\Models\TipoVinculo::create([
            'codigo' => 'estagiario',
            'descricao' => 'Estagiário',
        ]);


    }
}
