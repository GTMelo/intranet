<?php

use App\Models\Status;
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
            'slug' => 'pending',
            'display_name' => 'Validação Pendente',
            'description' => 'Item aguardando validação.'
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
