<?php

use App\Models\Email;
use App\Models\Role;
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
        // Criar mock superuser
        $user = User::create([
            'cpf' => '00000000000',
            'nome_completo' => 'Owner T. Admin',
            'nome_curto' => makeNomeCurto('Owner T. Admin'),
            'slug' => makeSlug('Owner T. Admin'),
            'password' => bcrypt('admin'),
        ]);

        $user->attachRole(Role::ofName('owner'));
    }
}
