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
            'owneradmin@admin.com',
            'someothermail@mail.com',
        ];

        foreach ($emails as $email){
            Email::create([
                'adress' => $email,
            ]);
        }

    }
}
