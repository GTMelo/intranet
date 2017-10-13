<?php

use Illuminate\Database\Seeder;

class IdiomaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Idioma::clear(['idioma_rh']);

        \App\Models\Idioma::create([
            'descricao' => 'inglês'
        ]);

        \App\Models\Idioma::create([
            'descricao' => 'espanhol'
        ]);

        \App\Models\Idioma::create([
            'descricao' => 'francês'
        ]);

        \App\Models\Idioma::create([
            'descricao' => 'alemão'
        ]);
    }
}
