<?php

use App\Models\Sexo;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TruncateAllSeeder::class);

//        $this->call(LaratrustSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(UnidadeTableSeeder::class);
        $this->call(TelefoneTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(CargoTableSeeder::class);
        $this->call(Sexo::class);
        $this->call(UserTableSeeder::class);

    }
}
