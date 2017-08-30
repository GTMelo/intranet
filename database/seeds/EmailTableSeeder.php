<?php

use App\Models\Email;
use Illuminate\Database\Seeder;

class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $emails = [
            'Sem E-mail',
            'owneradmin@admin.com',
            'someothermail@mail.com',
        ];

        foreach ($emails as $email){
            Email::create([
                'address' => $email,
            ]);
        }

        Email::first()->addFlag('is-personal');
        Email::find(2)->addFlag('is-work');

    }
}
