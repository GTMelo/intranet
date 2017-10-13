<?php

use App\Models\Dependente;
use App\Models\Documento;
use App\Models\Email;
use App\Models\Idioma;
use App\Models\Telefone;
use App\Models\User;
use App\Models\Rh;
use App\Models\Vinculo;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $imagePath = 'public/storage/documentos';
        $image = $faker->image($imagePath, 400, 400, null, false);

        // Cleanup
        User::clear(['email_user', 'telefone_user']);
        Rh::clear();
        Dependente::clear();
        Documento::clear();
        Vinculo::clear();

        $users = factory(User::class, 100)->create();

        foreach ($users as $user) {

            factory(Rh::class, 1)->create(['user_id' => $user->id]);

            $user->emails()->attach(Email::randomOrNew());
            $user->telefones()->attach(Telefone::randomOrNew(3));

            $dependentesQtd = $faker->numberBetween(0, 4);
            if($dependentesQtd > 0) factory(Dependente::class, $dependentesQtd)->create(['rh_id' => $user->id]);

            factory(Documento::class, 1)->states('foto')->create([
                'rh_id' => $user->id,
            ]);
            factory(Documento::class, 1)->states('cpf')->create([
                'rh_id' => $user->id,
                'imagem' => null,
                'identificacao' => $user->cpf,
            ]);
            $possibleAdditionalDocs = collect([
                'rg',
                'pis_pasep',
                'certificado_reservista',
                'titulo_eleitor',
                'carteira_motorista',
                'certificado_escolaridade',
                'certificado_cnd',
                'comprovante_residencia',
                'carteira_profissional',
                'passaporte',
            ]);
            $randomDocs = $possibleAdditionalDocs->random($faker->numberBetween(1,10));
            foreach ($randomDocs as $doc) {
                factory(Documento::class, 1)->states($doc)->create([
                    'rh_id' => $user->id,
                    'imagem' => $image,
                ]);
            }

            factory(\App\Models\Escolaridade::class, $faker->numberBetween(1,7))->create(['rh_id' => $user->id]);

            if($faker->boolean()) $user->rh->addIdioma(Idioma::first());

            $vinculos = ['s-com-vinculo', 's-sem-vinculo', 'terceirizado', 'estagiario'];
            $chosenVinculo = $faker->randomElement($vinculos);
            factory(\App\Models\Vinculo::class, 1)->states($chosenVinculo)->create(['rh_id' => $user->id]);

        }
    }
}
