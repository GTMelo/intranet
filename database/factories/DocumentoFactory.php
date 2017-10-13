<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Rh;

$factory->define(\App\Models\Documento::class, function (Faker\Generator $faker) {

    $tipo = \App\Models\TipoDocumento::random();
    $imagePath = 'storage/app/documentos';

    return [
        'tipo_documento_id' => $tipo->id,
        'rh_id' => Rh::random()->user_id,
        'imagem' => $faker->image($imagePath, 400, 400, null, false),
        'identificacao' => 123456,
    ];
});

$factory->state(\App\Models\Documento::class, 'cpf', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('cpf')->id,
        'orgao_expedidor' => 'SSP/DF',
        'data_emissao' => $faker->dateTimeBetween('-5 years'),
    ];
});

$factory->state(\App\Models\Documento::class, 'rg', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('rg')->id,
        'orgao_expedidor' => 'SSP/DF',
        'data_emissao' => $faker->dateTimeBetween('-5 years'),
    ];
});

$factory->state(\App\Models\Documento::class, 'pis_pasep', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('pis_pasep')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'certificado_reservista', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('certificado_reservista')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'titulo_eleitor', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('titulo_eleitor')->id,
        'zona' => $faker->randomNumber(3),
        'secao' => $faker->randomNumber(3),
    ];
});

$factory->state(\App\Models\Documento::class, 'titulo_eleitor', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('titulo_eleitor')->id,
        'zona' => $faker->randomNumber(3),
        'secao' => $faker->randomNumber(3),
    ];
});

$factory->state(\App\Models\Documento::class, 'carteira_motorista', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('carteira_motorista')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'certificado_escolaridade', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('certificado_escolaridade')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'certificado_cnd', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('certificado_cnd')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'comprovante_residencia', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('comprovante_residencia')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'foto', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('foto')->id,
    ];
});

$factory->state(\App\Models\Documento::class, 'carteira_profissional', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('carteira_profissional')->id,
        'data_emissao' => $faker->dateTimeBetween('-5 years'),
        'serie' => $faker->randomNumber(3),
    ];
});

$factory->state(\App\Models\Documento::class, 'passaporte', function (Faker\Generator $faker){
    return [
        'tipo_documento_id' => \App\Models\TipoDocumento::ofTipo('passaporte')->id,
        'data_emissao' => $faker->dateTimeBetween('-5 years'),
        'validade' => $faker->dateTimeBetween('4 years', '10 years'),
    ];
});

