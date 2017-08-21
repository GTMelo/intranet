<?php

use App\Models\Telefone;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar superuser
        $user = User::create([
            'cpf' => '00000000000',
            'nome_completo' => 'Owner Admin',
            'nome_curto' => 'Owner Admin',
            'password' => bcrypt('owneradmin'),
            'status_id' => 2,
            'unidade_id' => 1,
        ]);

        $user->telefones()->attach(Telefone::first(), ['is_main' => true]);
        $user->telefones()->attach(Telefone::find(2));
        $user->telefones()->attach(Telefone::find(3));
        $user->telefones()->attach(Telefone::find(4));
        $user->telefones()->attach(Telefone::find(5));

        $user->attachPermission('read-rhdata');
    }
}
