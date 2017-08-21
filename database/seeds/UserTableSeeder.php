<?php

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
        User::create([
            'cpf' => '00000000000',
            'nome_completo' => 'Owner Admin',
            'nome_curto' => 'Owner Admin',
            'password' => bcrypt('owneradmin'),
        ]);
    }
}
