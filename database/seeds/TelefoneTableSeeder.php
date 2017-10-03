<?php

use App\Models\Flag;
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

        Telefone::clear();

        Telefone::create([
            'numero' => 'Sem Número'
        ]);

        factory(Telefone::class, 100)->create();

        $faker = \Faker\Factory::create();

        foreach (Telefone::all() as $item){
            $flag = $faker->randomElement([null, Flag::inRandomOrder()->take(1)->first()]);
            if($flag && !$item->hasFlag($flag)) $item->addFlag($flag);
        }

    }
}
