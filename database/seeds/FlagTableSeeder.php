<?php

use App\Models\Flag;
use Illuminate\Database\Seeder;

class FlagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Flag::create([
            'code' => 'pessoal',
            'display_name' => 'Pessoal',
            'description' => 'Item pertence a uma pessoa. Ex: e-mails pessoais, telefones residenciais, etc.',
        ]);



    }
}
