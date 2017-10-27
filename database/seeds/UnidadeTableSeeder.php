<?php

use App\Models\Unidade;
use Illuminate\Database\Seeder;

class UnidadeTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Unidade::clear();

        Unidade::create([
            'sigla' => 'SAIN',
            'descricao' => 'Secretaria de Assuntos Internacionais',
            'tldr' => 'Some SAIN tldr here',
        ]);

        factory(Unidade::class, 15)->create();
        factory(Unidade::class, 15)->create();
        factory(Unidade::class, 15)->create();
        factory(Unidade::class, 50)->create();
    }
}
