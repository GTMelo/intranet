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
                        <th>Nome Curto</th>
                        <th>CPF</th>
                        <th>Unidade</th>
                        <th>Telefone</th>
                        <th>e-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($users as $user)
                            <td>{{ $user->nome_curto }}</td>
                            <td> {{ $user->cpf }}</td>
                            <td>{{ $user->unidade->sigla }}</td>
                            <td>{{ $user->main_telefone()->telefone }}</td>
                            <td>gustavo.ericson@gmail.com</td>
                        @endforeach
                    </tr>
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