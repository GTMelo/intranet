<?php

use App\Model\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'slug' => 'starter',
            'display_name' => 'Validação Pendente',
            'description' => 'Item recém cadastrado, aguardando validação.'
        ]);
        Status::create([
            'slug' => 'validated',
            'display_name' => 'Validado',
            'description' => 'Item validado'
        ]);
        Status::create([
            'slug' => 'inactive',
            'display_name' => 'Temporariamente Suspenso',
            'description' => 'Item temporariamente desativado'
        ]);

    }
}
