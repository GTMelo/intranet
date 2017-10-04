<?php

use App\Models\Email;
use App\Models\Telefone;
use App\Models\Rh;
use Illuminate\Database\Seeder;

class UserRhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = \App\Models\Rh::create([
            'user_id' => 1,
            'naturalidade_id' => 1,
            'unidade_id' => 1,
            'cargo_id' => 1,
            'sexo' => 'm',
            'estado_civil' => 'Solteiro',
        ]);

        $user->user->telefones()->attach(Telefone::first());
        $user->user->telefones()->attach(Telefone::find(2));
        $user->user->telefones()->attach(Telefone::find(3));
        $user->user->telefones()->attach(Telefone::find(4));
        $user->user->telefones()->attach(Telefone::find(5));

        $user->user->emails()->attach(Email::first());
        $user->user->emails()->attach(Email::find(2));
    }
}
