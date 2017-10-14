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
use Symfony\Component\Console\Output\ConsoleOutput;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $output = new ConsoleOutput();

        $userQtd = 100;

        $output->writeln("<info>Basic setup: users to create: $userQtd</info>");
        $faker = \Faker\Factory::create();

        $output->writeln("<info>Fetching images from Lorem Pixel</info>");
        $imagePath = 'public/storage/documentos';
        $image = $faker->image($imagePath, 400, 400, null, false);
        $fotosPessoas = [
            $faker->image($imagePath, 400, 400, 'people', false),
            $faker->image($imagePath, 400, 400, 'people', false),
            $faker->image($imagePath, 400, 400, 'people', false),
            $faker->image($imagePath, 400, 400, 'people', false),
            $faker->image($imagePath, 400, 400, 'people', false),
        ];

        // Cleanup
        User::clear(['email_user', 'telefone_user']);
        Rh::clear();
        Dependente::clear();
        Documento::clear();
        Vinculo::clear();

        // Create base users
        $output->writeln("<info>Creating base users</info>");
        $users = factory(User::class, $userQtd)->create();

        // Create RHs
        $output->writeln("<info>Creating related Rhs</info>");
        foreach (User::all() as $user){
            factory(Rh::class, 1)->create(['user_id' => $user->id]);
        }

        // Give everyone an email
        $output->writeln("<info>Creating Emails</info>");
        foreach ($users as $user){
            $address = str_replace('-', '.', $user->slug) . '@testmail.com';
            $email = Email::create(['address' => $address]);
            $user->emails()->attach($email);
        }

        // Give everyone a phone
        $output->writeln("<info>Creating Telefones</info>");
        foreach ($users as $user){
            $user->telefones()->attach(Telefone::randomOrNew(2));
        }

        // Give half the users some Dependentes
        $output->writeln("<info>Creating Dependentes</info>");
        foreach ($users->random($users->count()/2) as $user){
            $dependentesQtd = $faker->numberBetween(1, 4);
            factory(Dependente::class, $dependentesQtd)->create(['rh_id' => $user->id]);
        }

        // Give everyone a photo
        $output->writeln("<info>Creating Fotos</info>");
        foreach ($users as $user){
            factory(Documento::class, 1)->states(['foto'])->create([
                'rh_id' => $user->id,
                'imagem' => $faker->randomElement($fotosPessoas),
            ]);
        }

        // Give everyone a cpf
        $output->writeln("<info>Creating CPFs</info>");
        foreach ($users as $user){
            factory(Documento::class, 1)->states('cpf')->create([
                'rh_id' => $user->id,
                'imagem' => null,
                'identificacao' => $user->cpf,
            ]);
        }

        // Give everyone a variety of Documentos
        $output->writeln("<info>Creating Documentos</info>");
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
        foreach ($users as $user){
            $randomDocs = $possibleAdditionalDocs->random($faker->numberBetween(1,10));
            foreach ($randomDocs as $doc) {
                factory(Documento::class, 1)->states($doc)->create([
                    'rh_id' => $user->id,
                    'imagem' => $image,
                ]);
            }
        }

        // Give 60% of the users a variety of Escolaridades
        $output->writeln("<info>Creating Escolaridades</info>");
        foreach ($users->random(percent($users->count(), 60)) as $user){
            factory(\App\Models\Escolaridade::class, $faker->numberBetween(1,7))->create(['rh_id' => $user->id]);
        }

        // Give 40% o the users some Idioma knowledge
        $output->writeln("<info>Creating Idioma knowledge</info>");
        $idiomas = Idioma::all()->all();
        $niveis = ['básico', 'avançado', 'fluente'];
        foreach ($users->random(percent($users->count(), 40)) as $user){
            $user->rh->addIdioma($faker->randomElement($idiomas),
                $faker->randomElement($niveis),
                $faker->randomElement($niveis),
                $faker->randomElement($niveis),
                $faker->randomElement($niveis)
                );
        }

        // Give everyone a vinculo
        $output->writeln("<info>Creating Vinculos</info>");
        $vinculos = ['s-com-vinculo', 's-sem-vinculo', 'terceirizado', 'estagiario'];
        foreach ($users as $user){
            $chosenVinculo = $faker->randomElement($vinculos);
            factory(\App\Models\Vinculo::class, 1)->states($chosenVinculo)->create(['rh_id' => $user->id]);
        }
    }
}
