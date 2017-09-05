<?php

use App\Models\TipoEscolaridade;
use Illuminate\Database\Seeder;

class TipoEscolaridadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoEscolaridade::create(['descricao' => 'ensino fundamental']);
        TipoEscolaridade::create(['descricao' => 'ensino médio']);
        TipoEscolaridade::create(['descricao' => 'graduação']);
        TipoEscolaridade::create(['descricao' => 'especialização']);
        TipoEscolaridade::create(['descricao' => 'MBA']);
        TipoEscolaridade::create(['descricao' => 'Mestrado']);
        TipoEscolaridade::create(['descricao' => 'Doutorado']);
    }
}
