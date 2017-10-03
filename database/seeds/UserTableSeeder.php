<?php

use App\Models\Dependente;
use App\Models\Documento;
use App\Models\Email;
use App\Models\Escolaridade;
use App\Models\Role;
use App\Models\Telefone;
use App\Models\TipoDependente;
use App\Models\User;
use App\Models\UserRh;
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
        User::clear();
        UserRh::clear();
        Dependente::clear();


        $faker = \Faker\Factory::create();

        // Criar mock superuser
        $user = User::create([
            'cpf' => '00000000000',
            'nome_completo' => 'Owner T. Admin',
            'nome_curto' => makeNomeCurto('Owner T. Admin'),
            'slug' => makeSlug('Owner T. Admin'),
            'password' => bcrypt('admin'),
        ]);
        $user->attachRole(Role::ofName('owner'));


        factory(User::class, 200)->create();

        foreach (User::all() as $user) {
            factory(\App\Models\UserRh::class, 1)->create([
                'user_id' => $user->id,
            ]);
            $user->emails()->attach(Email::random());
            $user->telefones()->attach(Telefone::random($faker->numberBetween(1, 5)));

            for($i = 0; $i > $faker->numberBetween(0, 10); $i++){
                $user->dependentes()->attach(factory(Dependente::class, 1)->create());
            }

            $user->documentos()->attach(factory(Documento::class, 1))->create([
                'imagem' => $faker->image(),
                'tipo_documento_id' => TipoDependente::ofTipo('foto'),
            ]);

            $image = $faker->image();
            for($i = 0; $i > $faker->numberBetween(0, 10); $i++){
                $user->documentos()->attach(factory(Documento::class, 1)->create([
                    'imagem' => $image,
                ]));
            }

            // Todo model factory para escolaridades e vínculos
//            for($i = 0; $i > $faker->numberBetween(0, 10); $i++){
//                $user->rh->escolaridades()->attach(factory(Escolaridade::class, 1)->create());
//            }
        }
    }
}
