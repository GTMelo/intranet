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
                        @permission('read-rhdata')
                        <th>CPF</th> @endpermission
                        <th>Unidade</th>
                        <th>Telefone</th>
                        <th>e-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nome_curto }}</td>
                            @permission('read-rhdata')
                            <td>{{ $user->cpf }}</td> @endpermission
                            <td>@if(isset($user->unidade)){{ $user->unidade->sigla }}@else Sem unidade @endif </td>
                            <td>@if(count($user->telefones)){{ $user->main_telefone()->numero }}@else Sem
                                telefone @endif </td>
                            <td>@if(count($user->emails)){{ $user->main_email()->address }}@else Sem e-mail @endif </td>
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