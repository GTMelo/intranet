@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Lista de Usuários',
    'sub' => 'Confira a lista de contatos da SAIN'
     ])

    <main class="container">
        <section>
            @if(count($users))
                <table class="table is-striped is-fullwidth">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        @permission('read-rhdata') <th>CPF</th> @endpermission
                        <th>Cargo</th>
                        <th>Unidade</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="/usuarios/{{ $user->user->slug() }}">{{ $user->user->nome_curto }}</a></td>
                            @permission('read-rhdata') <td>{{ $user->user->cpf }}</td> @endpermission
                            <td title="{{ $user->cargo->descricao }}">{{ $user->cargo->abreviacao }}</td> {{-- TODO Abreviação on hover = mostrar descrição --}}
                            <td title="{{ $user->unidade->descricao }}">{{ $user->unidade->sigla }}</td>
                            <td>@if(count($user->ramal())) {{ $user->ramal()->numero }} @endif</td>
                            <td>@if(count($user->email_funcional())) {{ $user->email_funcional()->address }} @endif</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="level">
                    <div class="level-item">
                        <span>Nenhum usuário encontrado</span>
                    </div>
                </div>
            @endif

        </section>

    </main>
@endsection