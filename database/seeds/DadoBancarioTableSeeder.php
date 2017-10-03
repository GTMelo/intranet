<?php

use App\Models\DadoBancario;
use Illuminate\Database\Seeder;

class DadoBancarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DadoBancario::create([
            'banco_id' => 1,
            'agencia' => '0000-0',
            'conta' => '00000-0',
        ]);

        factory(DadoBancario::class, 400)->create();
    }
}
