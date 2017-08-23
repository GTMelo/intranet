<?php

use App\Models\Cargo;
use Illuminate\Database\Seeder;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Cargo::create([
            'abreviacao' => 'SC',
            'descricao' => 'Sem Cargo'
        ]);

    }
}
