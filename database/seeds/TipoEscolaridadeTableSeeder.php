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
        TipoEscolaridade::clear();

        TipoEscolaridade::create(['descricao' => 'ensino fundamental', 'nivel' => 1]);
        TipoEscolaridade::create(['descricao' => 'ensino médio', 'nivel' => 2]);
        TipoEscolaridade::create(['descricao' => 'graduação', 'nivel' => 3]);
        TipoEscolaridade::create(['descricao' => 'especialização', 'nivel' => 4]);
        TipoEscolaridade::create(['descricao' => 'MBA', 'nivel' => 4]);
        TipoEscolaridade::create(['descricao' => 'Mestrado', 'nivel' => 4]);
        TipoEscolaridade::create(['descricao' => 'Doutorado', 'nivel' => 4]);
    }
}
