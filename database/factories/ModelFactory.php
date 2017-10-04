<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TipoDependente;
use App\Models\TipoVinculo;
use App\Models\User;
use App\Models\Rh;

$factory->define( \App\Models\Cargo::class, function (Faker\Generator $faker) {

    $faker->addProvider(new \Faker\Provider\Cargo($faker));

    $cargo = $faker->cargo();

    return [
        'descricao' => $cargo,
        'abreviacao' => makeAbrv($cargo),
    ];
});



$factory->define( \App\Models\DadoBancario::class, function (Faker\Generator $faker) {
    return [
        'banco_id' => \App\Models\Banco::inRandomOrder()->take(1)->first()->id,
        'agencia' => $faker->randomNumber(5),
        'conta' => $faker->randomNumber(7),
    ];
});



$factory->define(\App\Models\Dependente::class , function (Faker\Generator $faker) {

    $brFaker = \Faker\Factory::create('pt_BR');
    $brFaker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

    $tipo = TipoDependente::inRandomOrder()->take(1)->first();

    switch ($tipo->descricao){
        case 'pai':
            $nome = $faker->firstNameMale() . ' ' . $faker->lastName();
            $data_nascimento = $faker->dateTimeBetween('-80 years', '-60 years');
            break;
        case 'mãe':
            $nome = $faker->firstNameFemale() . ' ' . $faker->lastName();
            $data_nascimento = $faker->dateTimeBetween('-80 years', '-60 years');
            break;
        case 'filho':
            $nome = $faker->firstName() . ' ' . $faker->lastName();
            $data_nascimento = $faker->dateTimeBetween('-15 years', '-5 years');
            break;
        case 'cônjuge':
            $nome = $faker->firstName() . ' ' . $faker->lastName();
            $data_nascimento = $faker->dateTimeBetween('-50 years', '-20 years');
            break;
    }

    return [
        'tipo_dependente_id' => $tipo->id,
        'user_id' => \App\Models\User::inRandomOrder()->take(1)->first()->id,
        'nome' => $nome,
        'data_nascimento' => $data_nascimento,
        'cpf' => $brFaker->cpf(),
        'is_dependente' => $faker->boolean(25),
    ];
});



$factory->define(\App\Models\Documento::class, function (Faker\Generator $faker, $tipo) {

    $tipo = \App\Models\TipoDocumento::random();

    switch ($tipo->descricao){
        case 'cpf':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(),
                'orgao_expedidor' => 'SSP/DF',
                'data_emissao' => $faker->dateTimeBetween('-5 years'),
            ];
        case 'rg':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(),
                'orgao_expedidor' => 'SSP/DF',
                'data_emissao' => $faker->dateTimeBetween('-5 years'),
            ];
        case 'pis_pasep':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(),
            ];
        case 'certificado_reservista':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
            ];
        case 'titulo_eleitor':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(),
                'zona' => $faker->randomNumber(3),
                'secao' => $faker->randomNumber(3)
            ];
        case 'carteira_motorista':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(11),
            ];
        case 'certificado_escolaridade':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
            ];
        case 'certificado_cnd':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
            ];
        case 'comprovante_residencia':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
            ];
        case 'foto':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
            ];
        case 'carteira_profissional':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(),
                'data_emissao' => $faker->dateTimeBetween('-5 years'),
                'serie' => $faker->randomNumber(3),
            ];
        case 'passaporte':
            return [
                'user_rh_id' => \App\Models\Rh::inRandomOrder()->take(1)->first()->user_id,
                'tipo_documento_id' => $tipo->id,
                'imagem' => $faker->image(null, 400, 400),
                'identificacao' => $faker->randomNumber(),
                'data_emissao' => $faker->dateTimeBetween('-5 years'),
                'validade' => $faker->dateTimeBetween('4 years', '10 years'),
            ];
    }
    return null;
});



$factory->define(\App\Models\Email::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->email(),
    ];
});



$factory->define(\App\Models\Endereco::class, function (Faker\Generator $faker) {
    return [
        'cidade_id' => \App\Models\Cidade::inRandomOrder()->take(1)->first()->id,
        'logradouro' => $faker->address(),
        'cep' => $faker->randomNumber(8),
    ];
});



$factory->define(\App\Models\Escolaridade::class, function (Faker\Generator $faker) {
    return [
        'user_id' => \App\Models\User::inRandomOrder()->take(1)->first()->id,
        'tipo_escolaridade_id' => \App\Models\TipoEscolaridade::inRandomOrder()->take(1)->first(),
        'titulo' => $faker->sentence(10),
        'situacao' => $faker->randomElement(['cursando', 'completo']),
        'instituicao' => $faker->sentence(),
        'inicio' => $faker->dateTimeBetween('-10 years', '-2 years'),
        'termino' => $faker->randomElement([null, $faker->dateTimeBetween('-1 year')])
    ];
});



$factory->define(\App\Models\Telefone::class, function (Faker\Generator $faker) {
    return [
        'numero' => $faker->phoneNumber()
    ];
});



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
    ];
});

$factory->define(\App\Models\Rh::class , function (Faker\Generator $faker) {
    return [
        'sexo' => $faker->randomElement(['m', 'f']),
        'data_nascimento' => $faker->dateTimeBetween('-50 years', '-20 years'),
        'estado_civil' => $faker->randomElement(['solteiro', 'casado']),
        'unidade_id' => \App\Models\Unidade::inRandomOrder()->take(1)->first()->id,
        'cargo_id' => \App\Models\Cargo::inRandomOrder()->take(1)->first()->id,
        'naturalidade_id' => \App\Models\Cidade::inRandomOrder()->take(1)->first()->id,
        'endereco_id' => \App\Models\Endereco::inRandomOrder()->take(1)->first()->id,
        'dado_bancario_id' => factory(\App\Models\DadoBancario::class, 1)->create()->first()->id,
    ];
});



$factory->define(\App\Models\Unidade::class, function (Faker\Generator $faker) {

    $us = \App\Models\Unidade::inRandomOrder()->take(1)->first();
    if(!$us) $us = null;

    $nome = $faker->words(3, true);

    return [
        'unidade_superior_id' => $faker->randomElement([null, $us]),
        'descricao' => $nome,
        'sigla' => makeAbrv($nome),
        'tldr' => $faker->sentence(),
    ];
});

$factory->define(\App\Models\Vinculo::class, function (Faker\Generator $faker) {

    $user_rh_id = Rh::random()->id;
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

    return [
        'user_rh_id' => User::random(),
        'supervisor_id' => $faker->randomElement([null, null, User::random()]),
    ];
});

