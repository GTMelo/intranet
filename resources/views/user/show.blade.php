@extends('layouts.master')

@section('content')

    @if(auth()->check() && auth()->user()->canOrOwns($user->rh, 'global-edit-user-rh'))
        <toolbar>
            <tool-button icon="fa-pencil-square-o" url="/usuarios/{{$user->slug}}/editar">Editar usuário</tool-button>
            <tool-button icon="fa-print" url="/usuarios/{{$user->slug}}/editar">Imprimir ficha do usuário</tool-button>

            {{--TODO apenas se usuário inválido e auth is admin--}}
            <tool-button icon="fa-check-square-o" url="/usuarios/{{$user->slug}}/validar">Validar usuário</tool-button>

            <tool-button icon="fa-trash-o" url="/usuarios/{{$user->slug}}/excluir">Excluir usuário</tool-button>
        </toolbar>
    @endif

    @include('user.show.hero_banner')

    <main class="container user-profile">

        @include('user.sidebar')

        <main>
            @yield('user-content')
        </main>
    </main>
@endsection