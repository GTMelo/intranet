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
                        <th>e-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nome_curto }}</td>
                            @permission('read-rhdata')<td>{{ $user->cpf }}</td> @endpermission
                            <td>{{ $user->cargo->abreviacao }}</td> {{-- TODO Abreviação on hover = mostrar descrição --}}
                            <td>{{ $user->unidade->sigla }}</td>
                            <td>{{ $user->main_telefone()->numero }}</td>
                            <td>{{ $user->main_email()->address }}</td>
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