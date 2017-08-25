<?php

use App\Models\Email;
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
            'nome_curto' => 'Owner Admin',
            'password' => bcrypt('owneradmin'),
        ]);

        $user->attachPermission('read-rhdata');
    }
}
