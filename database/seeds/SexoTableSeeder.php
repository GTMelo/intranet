<?php

use App\Sexo;
use Illuminate\Database\Seeder;

class SexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sexo::create([
            'abreviacao' => 'm',
            'descricao' => 'Masculino',
            'titulo' => 'Sr',
        ]);

        Sexo::create([
            'abreviacao' => 'f',
            'descricao' => 'Feminino',
            'titulo' => 'Sra',
        ]);
    }
}
