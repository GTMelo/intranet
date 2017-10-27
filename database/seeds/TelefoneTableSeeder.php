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


        factory(Telefone::class, 100)->create();

        $faker = \Faker\Factory::create();

        foreach (Telefone::all() as $item){
            $flag = $faker->randomElement([null, Flag::random()]);
            if($flag && !$item->hasFlag($flag)) $item->addFlag($flag);
        }

    }
}
