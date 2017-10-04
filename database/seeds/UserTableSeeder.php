<?php

use App\Models\Dependente;
use App\Models\Documento;
use App\Models\Email;
use App\Models\Escolaridade;
use App\Models\Role;
use App\Models\Telefone;
use App\Models\TipoDependente;
use App\Models\User;
use App\Models\Rh;
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
        $image = $faker->image(null, 400, 400);

        // Cleanup
        User::clear();
        Rh::clear();
        Dependente::clear();

        $users = factory(User::class, 100)->create();

        foreach ($users as $user) {

            factory(Rh::class, 1)->create(['user_id' => $user->id]);
            $user->emails()->attach(Email::random());
            $user->telefones()->attach(Telefone::random($faker->numberBetween(1, 3)));
            $user->dependentes()->attach(factory(Dependente::class, 1)->create(['user_id' => $user->id]));
            $user->documentos()->attach(factory(Documento::class, 5)->create(['imagem' => $image,]));
        }


//        // Criar mock superuser
//        $user = User::create([
//            'cpf' => '00000000000',
//            'nome_completo' => 'Owner T. Admin',
//            'nome_curto' => makeNomeCurto('Owner T. Admin'),
//            'slug' => makeSlug('Owner T. Admin'),
//            'password' => bcrypt('admin'),
//        ]);
//        factory(\App\Models\UserRh::class, 1)->create([
//            'user_id' => $user->id,
//        ]);
//        $user->attachRole(Role::ofName('owner'));
//        $user->emails()->attach(Email::random());
//        $user->telefones()->attach(Telefone::random($faker->numberBetween(1, 5)));
//
//        // Criar users
//        $users = factory(User::class, 200)->create();
//
//        // Criar dados adicionais pra cada user
//        foreach ($users as $user) {
//
//            // UserRh
//            factory(\App\Models\UserRh::class, 1)->create([
//                'user_id' => $user->id,
//            ]);
//
//            // Emails
//            $user->emails()->attach(Email::random());
//
//            // Telefones
//            $user->telefones()->attach(Telefone::random($faker->numberBetween(1, 5)));
//
//            // Dependentes
//            for ($i = 0; $i > $faker->numberBetween(0, 10); $i++) {
//                $user->dependentes()->attach(factory(Dependente::class, 1)->create());
//            }
//
//            // Foto
//            $image = $faker->image();
//            $user->documentos()->attach(factory(Documento::class, 1))->create([
//                'imagem' => $image,
//                'tipo_documento_id' => TipoDependente::ofTipo('foto'),
//            ]);
//
//            // Documentos
//            $image = $faker->image();
//            for($i = 0; $i > $faker->numberBetween(0, 10); $i++){
//                $user->documentos()->attach(factory(Documento::class, 1)->create([
//                    'imagem' => $image,
//                ]));
//            }

        // Todo model factory para escolaridades e vínculos
//            for($i = 0; $i > $faker->numberBetween(0, 10); $i++){
//                $user->rh->escolaridades()->attach(factory(Escolaridade::class, 1)->create());
//            }
//        }
    }
}
