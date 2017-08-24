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
                'is_capital' => true,
            ],
        ];







        foreach ($cidades as $cidade){
            Cidade::create([
                'nome' => $cidade['nome'],
                'codigo_telefone' => $cidade['codigo_telefone'],
                'pais_id' => $cidade['pais_id'],
                'is_capital' => $cidade['is_capital'],
                'entidade_subnacional' => $cidade['entidade_subnacional'],
            ]);
        }
    }
}
