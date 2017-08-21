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
        $roles = [
            [
                'name' => 'owner',
                'display_name' => 'Owner Admin',
                'description' => 'Administrador principal do sistema',
            ],
            [
                'name' => 'admin',
                'display_name' => 'Administrador Geral',
                'description' => 'Administrador do sistema',
            ],
            [
                'name' => 'rh-admin',
                'display_name' => 'Administrador de Gestão de Pessoas',
                'description' => 'Administrador da área de Gestão de Pessoas do sistema',
            ],
        ];

        foreach ($roles as $role){
            Role::create(
                [
                    'name' => $role['name'],
                    'display_name' => $role['display_name'],
                    'description' => $role['description'],
                ]
            );
        }
    }
}
