<?php

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidades = [
            [
                'nome' => 'Brasília',
                'estado_id' => 1,
            ],
        ];

        foreach ($cidades as $cidade){
            Cidade::create([
                'nome' => $cidade['nome'],
                'estado_id' => $cidade['estado_id'],
            ]);
        }
    }
}
