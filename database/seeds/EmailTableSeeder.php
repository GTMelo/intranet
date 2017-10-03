<?php

use App\Models\Email;
use App\Models\Flag;
use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Email::clear();

        Email::create([
            'address' => 'Sem E-mail',
        ]);

        factory(Email::class, 100)->create();

        $faker = \Faker\Factory::create();

        foreach (Email::all() as $item){
            $flag = $faker->randomElement([null, Flag::inRandomOrder()->take(1)->first()]);
            if($flag && !$item->hasFlag($flag)) $item->addFlag($flag);
        }

    }
}
