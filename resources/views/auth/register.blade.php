@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Cadastrar novo usuário',
    'sub' => 'Preencha os dados abaixo para criar sua conta na intraSAIN'
     ])

    <main class="container">

        @include('forms.registration')

    </main>

@endsection
