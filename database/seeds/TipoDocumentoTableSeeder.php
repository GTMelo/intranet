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
            'descricao' => 'rg',
            'display_name' => 'Identidade',
        ]);

        TipoDocumento::create([
            'descricao' => 'pis_pasep',
            'display_name' => 'PIS/PASEP',
        ]);

        TipoDocumento::create([
            'descricao' => 'certificado_reservista',
            'display_name' => 'Certificado de Reservista',
        ]);

        TipoDocumento::create([
            'descricao' => 'titulo_eleitor',
            'display_name' => 'Título de Eleitor',
        ]);

        TipoDocumento::create([
            'descricao' => 'carteira_motorista',
            'display_name' => 'Carteira de Motorista',
        ]);

        TipoDocumento::create([
            'descricao' => 'certificado_escolaridade',
            'display_name' => 'Certificado de Escolaridade',
        ]);

        TipoDocumento::create([
            'descricao' => 'certificado_cnd',
            'display_name' => 'Certificado de Nascimento, Casamento ou Divórcio',
        ]);

        TipoDocumento::create([
            'descricao' => 'comprovante_residencia',
            'display_name' => 'Comprovante de Residência',
        ]);

        TipoDocumento::create([
            'descricao' => 'carteira_profissional',
            'display_name' => 'Carteira Profissional',
        ]);

        TipoDocumento::create([
            'descricao' => 'passaporte',
            'display_name' => 'Passaporte',
        ]);

    }
}
