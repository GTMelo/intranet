<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {

    static $password;

    $brFaker = Faker\Factory::create('pt_BR');
    $brFaker->addProvider(new Faker\Provider\pt_BR\Person($brFaker));

    $sexo = $faker->randomElement(['m', 'f']);
    $primeiro_nome = ($sexo === 'm')? $faker->firstNameMale: $faker->firstNameFemale;
    $nome_completo = $primeiro_nome .' '. $faker->lastName .' '. $faker->lastName;

    return [
        'cpf' => $brFaker->cpf(),
        'nome_completo' => $nome_completo,
        'nome_curto' => makeNomeCurto($nome_completo),
        'slug' => makeSlug($nome_completo),
        'password' => $password ?: $password = bcrypt('secret'),
    ];
});
