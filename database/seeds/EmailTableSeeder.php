<?php

use App\Models\Email;
use App\Models\Flag;
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
        Email::clear();

    }
}
