@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Cadastrar Novo Usuário',
    'sub' => 'Preencha os dados abaixo para criar sua conta na IntraSAIN'
     ])

    <section class="section container-compact">
        @include('forms.registration')
    </section>

@endsection
