@extends('layouts.master')

@section('content')
    <section class="hero hero-with-image is-primary">
        <div class="hero-body">
            <div class="container">
                <div class="hero-image">
                    <img src="http://via.placeholder.com/150x150">
                </div>
                <div class="hero-content">
                    <h1 class="title">{{ $user->rh->nome_completo }}</h1>
                    <h2 class="subtitle">{{ $user->rh->cargo->descricao }} - {{ $user->rh->unidade->descricao }}</h2>
                </div>
            </div>
        </div>
    </section>

    <main class="container">
        <div>{{ $user }}</div>
    </main>
@endsection