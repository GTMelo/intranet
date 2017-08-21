<?php

use App\Models\Telefone;
use Illuminate\Database\Seeder;

class TelefoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $telefones = [
            ['numero' => 'Sem Número'],
            ['numero' => '1234-1234'],
            ['numero' => '3216-4354'],
            ['numero' => '4588-1236'],
            ['numero' => '9874-6548'],
            ['numero' => '1234-9687'],
        ];

        foreach ($telefones as $telefone){
            Telefone::create([
                'numero' => $telefone['numero']
            ]);
        }


    }
}
