<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rh;
use App\Models\TipoVinculo;

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    static $password;

    $brFaker = Faker\Factory::create('pt_BR');
    $brFaker->addProvider(new Faker\Provider\pt_BR\Person($brFaker));

    $sexo = $faker->randomElement(['m', 'f']);
    $primeiro_nome = ($sexo == 'm')? $faker->firstNameMale: $faker->firstNameFemale;
    $nome_completo = $primeiro_nome .' '. $faker->lastName .' '. $faker->lastName;

    return [
        'cpf' => $brFaker->cpf(),
        'nome_curto' => makeNomeCurto($nome_completo),
        'slug' => makeSlug($nome_completo),
        'nome_completo' => $nome_completo,
        'password' => $password ?: $password = bcrypt('secret'),
        'unidade_id' => \App\Models\Unidade::random()->id
    ];
});

$factory->define(\App\Models\Rh::class , function (Faker\Generator $faker) {
    return [
        'sexo' => $faker->randomElement(['m', 'f']),
        'data_nascimento' => $faker->dateTimeBetween('-50 years', '-20 years'),
        'estado_civil' => $faker->randomElement(['solteiro', 'casado']),
        'cargo_id' => \App\Models\Cargo::randomOrNew()->id,
        'naturalidade' => 'Brasília',
        'nacionalidade' => 'Brasil',
        'endereco_id' => factory(\App\Models\Endereco::class, 1)->create()->first()->id,
        'dado_bancario_id' => factory(\App\Models\DadoBancario::class, 1)->create()->first()->id,
    ];
});

$factory->define(\App\Models\Vinculo::class, function (Faker\Generator $faker) {

    $rh_id = Rh::random()->user_id;
    $tipo_vinculo = TipoVinculo::random();
    $entrada_sain = $faker->dateTimeBetween('-10 years', '-2 days');

    return [
        'rh_id' => $rh_id,
        'tipo_vinculo_id' => $tipo_vinculo->id,
        'entrada_sain' => $entrada_sain,
        'matricula' => 123456
    ];

});

$factory->state(\App\Models\Vinculo::class,'s-com-vinculo' ,function (Faker\Generator $faker) {
    $faker->addProvider(new \Faker\Provider\Cargo($faker));
    return [
        'tipo_vinculo_id' => 1,
        'orgao_origem' => $faker->sentence(3),
        'matricula_origem' => $faker->randomNumber(4),
        'cargo_origem' => $faker->cargo(),
        'classe' => $faker->randomElement(['A','B','C','D','E']),
        'padrao' => $faker->numberBetween(1, 5),
        'funcao' => $faker->randomElement(['FG', 'DAS', 'SPE']),
        'denominacao_funcao' => $faker->randomElement(['FG1', 'DAS1', 'SPE1'])
    ];
});

$factory->state(\App\Models\Vinculo::class,'s-sem-vinculo' ,function (Faker\Generator $faker) {
    return [
        'tipo_vinculo_id' => 2,
        'funcao' => $faker->randomElement(['FG', 'DAS', 'SPE']),
        'denominacao_funcao' => $faker->randomElement(['FG1', 'DAS1', 'SPE1']),
        'ato_nomeacao' => 'Portaria 123/2017',

    ];
});

$factory->state(\App\Models\Vinculo::class,'terceirizado' ,function (Faker\Generator $faker) {
    return [
        'tipo_vinculo_id' => 3,
        'empresa' => $faker->company,
    ];
});

$factory->state(\App\Models\Vinculo::class,'estagiario' ,function (Faker\Generator $faker) {
    return [
        'tipo_vinculo_id' => 4,
        'instituicao_ensino' => $faker->company,
        'nivel' => '1',
        'curso' => $faker->sentence(3),
        'semestre' => $faker->numberBetween(1,6),
        'numero_contrato' => $faker->randomNumber(4),
        'data_contrato' => $faker->dateTimeBetween('-2 years', '-1 day'),
        'supervisor_id' => \App\Models\User::first()->id,
    ];
});
