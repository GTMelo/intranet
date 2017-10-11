<?php

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Endereco::clear();

        Endereco::create([
            'logradouro' => 'Sem Endereço',
            'cep' => 'Sem CEP'
        ]);

        factory(Endereco::class, 300)->create();
    }
}
