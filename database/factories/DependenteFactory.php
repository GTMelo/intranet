<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TipoDependente;

$factory->define(\App\Models\Dependente::class , function (Faker\Generator $faker) {

    $brFaker = \Faker\Factory::create('pt_BR');
    $brFaker->addProvider(new \Faker\Provider\pt_BR\Person($faker));

    return [
        'tipo_dependente_id' => TipoDependente::random()->id,
        'rh_id' => \App\Models\Rh::random()->user_id,
        'nome' => $faker->name,
        'data_nascimento' => $faker->dateTimeBetween('-50 years', '-12 years'),
        'cpf' => $brFaker->cpf(),
        'is_dependente' => $faker->boolean(25),
    ];
});

$factory->state(\App\Models\Dependente::class, 'pai', function (Faker\Generator $faker){
    return [
        'tipo_dependente_id' => \App\Models\TipoDependente::ofTipo('pai')->id,
        'nome' => $faker->firstNameMale() . ' ' . $faker->lastName(),
        'data_nascimento' => $faker->dateTimeBetween('-80 years', '-60 years'),
    ];
});

$factory->state(\App\Models\Dependente::class, 'mãe', function (Faker\Generator $faker){
    return [
        'tipo_dependente_id' => \App\Models\TipoDependente::ofTipo('mãe')->id,
        'nome' => $faker->firstNameFemale() . ' ' . $faker->lastName(),
        'data_nascimento' => $faker->dateTimeBetween('-80 years', '-60 years'),
    ];
});

$factory->state(\App\Models\Dependente::class, 'filho', function (Faker\Generator $faker){
    return [
        'tipo_dependente_id' => \App\Models\TipoDependente::ofTipo('filho')->id,
        'nome' => $faker->firstName() . ' ' . $faker->lastName(),
        'data_nascimento' => $faker->dateTimeBetween('-15 years', '-5 years'),
    ];
});

$factory->state(\App\Models\Dependente::class, 'cônjuge', function (Faker\Generator $faker){
    return [
        'tipo_dependente_id' => \App\Models\TipoDependente::ofTipo('cônjuge')->id,
        'nome' => $faker->firstName() . ' ' . $faker->lastName(),
        'data_nascimento' => $faker->dateTimeBetween('-50 years', '-20 years'),
    ];
});


