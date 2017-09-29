<?php

use App\Models\TipoDependente;
use Illuminate\Database\Seeder;

class TipoDependenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipos = [
          'pai', 'mãe', 'filho', 'cônjuge'
        ];

        foreach ($tipos as $tipo){
            TipoDependente::create([
                'descricao' => $tipo,
            ]);
        }

    }
}
