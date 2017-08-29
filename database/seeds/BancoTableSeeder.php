<?php

use App\Models\Banco;
use Illuminate\Database\Seeder;

class BancoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banco::create([
            'codigo_banco' => 0,
            'nome' => 'Sem Banco',
        ]);
    }
}
