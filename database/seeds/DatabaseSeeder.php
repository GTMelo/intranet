<?php

use App\Models\Flag;
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

        $this->call(FlagTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(TipoEscolaridadeTableSeeder::class);
        $this->call(TipoDependenteTableSeeder::class);
        $this->call(TipoVinculoTableSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UnidadeTableSeeder::class);
        $this->call(IdiomaTableSeeder::class);
        $this->call(PaisTableSeeder::class);
        $this->call(EstadoTableSeeder::class);
        $this->call(CidadeTableSeeder::class);
        $this->call(BancoTableSeeder::class);
        $this->call(TelefoneTableSeeder::class);
        $this->call(EmailTableSeeder::class);
        $this->call(UserTableSeeder::class);

    }
}
