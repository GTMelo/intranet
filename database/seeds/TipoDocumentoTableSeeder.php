<?php

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TipoDocumento::clear();

        TipoDocumento::create([
            'descricao' => 'cpf',
        ]);

        TipoDocumento::create([
            'descricao' => 'rg',
        ]);

        TipoDocumento::create([
            'descricao' => 'pis_pasep',
        ]);

        TipoDocumento::create([
            'descricao' => 'certificado_reservista',
        ]);

        TipoDocumento::create([
            'descricao' => 'titulo_eleitor',
        ]);

        TipoDocumento::create([
            'descricao' => 'carteira_motorista',
        ]);

        TipoDocumento::create([
            'descricao' => 'certificado_escolaridade',
        ]);

        TipoDocumento::create([
            'descricao' => 'certificado_cnd',
        ]);

        TipoDocumento::create([
            'descricao' => 'comprovante_residencia',
        ]);

        TipoDocumento::create([
            'descricao' => 'foto',
        ]);

        TipoDocumento::create([
            'descricao' => 'carteira_profissional',
        ]);

        TipoDocumento::create([
            'descricao' => 'passaporte',
        ]);

    }
}
