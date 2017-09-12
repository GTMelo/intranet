@extends('layouts.master')

@section('content')

    @include('user.show.hero_banner')

    <main class="container">
        @if(request()->get('secao'))
            @if(request()->get('secao') == 'dados_basicos') @include('user.show.dados_basicos') @endif
            @if(request()->get('secao') == 'dados_pessoais') @include('user.show.dados_pessoais') @endif
            @if(request()->get('secao') == 'dados_funcionais') @include('user.show.dados_funcionais') @endif
            @if(request()->get('secao') == 'dados_academicos') @include('user.show.dados_academicos') @endif
        @else
            @include('user.show.dados_basicos')
        @endif
    </main>
@endsection