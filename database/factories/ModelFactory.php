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

use App\Models\Cidade;
use App\Models\TipoDependente;
use App\Models\TipoVinculo;
use App\Models\User;

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
        'banco_id' => \App\Models\Banco::random()->id,
        'agencia' => $faker->randomNumber(3),
        'conta' => $faker->randomNumber(4),
    ];
});

$factory->define(\App\Models\Email::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->email(),
    ];
});

$factory->define(\App\Models\Endereco::class, function (Faker\Generator $faker) {
    return [
        'logradouro' => $faker->address(),
        'cidade' => 'Brasília',
        'cep' => $faker->randomNumber(8),
    ];
});

$factory->define(\App\Models\Escolaridade::class, function (Faker\Generator $faker) {
    return [
        'rh_id' => User::random()->id,
        'tipo_escolaridade_id' => \App\Models\TipoEscolaridade::random()->id,
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

$factory->define(\App\Models\Unidade::class, function (Faker\Generator $faker) {

    $us = \App\Models\Unidade::random();
    if(!$us) $us = null;

    $nome = $faker->words(3, true);

    return [
        'unidade_superior_id' => $faker->randomElement([null, $us]),
        'descricao' => $nome,
        'sigla' => makeAbrv($nome),
        'tldr' => $faker->sentence(),
    ];
});

