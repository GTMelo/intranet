@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Cadastrar Novo Usuário',
    'sub' => 'Preencha os dados abaixo para criar sua conta na IntraSAIN'
     ])

    <main class="container">

        @include('forms.registration')

    </main>

@endsection
