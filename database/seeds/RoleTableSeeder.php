<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'list-user',
            'display_name' => 'Listar Usuários',
            'description' => 'Ver a lista de usuários cadastrados',
        ]);
    }
}
