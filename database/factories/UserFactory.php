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
        'naturalidade_id' => \App\Models\Cidade::randomOrNew()->id,
        'endereco_id' => \App\Models\Endereco::randomOrNew()->id,
        'dado_bancario_id' => \App\Models\DadoBancario::randomOrNew()->id,
    ];
});

$factory->define(\App\Models\Vinculo::class, function (Faker\Generator $faker) {

    $rh_id = Rh::random()->user_id;
    $tipo_vinculo = TipoVinculo::random();
    $entrada_sain = $faker->dateTimeBetween('-10 years', '-2 days');
    $matricula = $faker->randomNumber(7);
    $supervisor_id = null;
    $orgao_origem = null;
    $matricula_origem = null;
    $cargo_origem = null;
    $classe = null;
    $padrao = null;
    $funcao = null;
    $denominacao_funcao = null;
    $ato_nomeacao = null;
    $data_dou = null;
    $empresa = null;
    $instituicao_ensino = null;
    $nivel = null;
    $curso = null;
    $semestre = null;
    $numero_contrato = null;
    $data_contrato = null;

//    return [
//        'user_rh_id' => User::random(),
//        'supervisor_id' => $faker->randomElement([null, null, User::random()]),
//    ];
});