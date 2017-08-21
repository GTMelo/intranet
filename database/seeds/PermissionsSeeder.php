<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            [
                'name' => 'list-users',
                'display-name' => 'Listar Usuários',
                'description' => 'Ver a lista de usuários cadastrados'
            ],
            [
                'name' => 'read-rhdata',
                'display-name' => 'Ver dados de RH',
                'description' => 'Ver dados de um usuário referentes a área de gestão de pessoas'
            ],
        ];

        foreach ($permissions as $permission){
            $listUser= new Permission();
            $listUser->name         = $permission['name'];
            $listUser->display_name = $permission['display-name'];
            $listUser->description  = $permission['description'];
            $listUser->save();
        }


    }
}
