@extends('layouts.master')

@section('content')

    @include('layouts.partials.page_header', [
    'title' => 'Lista de Usuários',
    'sub' => 'Confira a lista de contatos da SAIN'
     ])

    <main class="container">
        <section>
            @if(count($users))
                {{ $users->links('components.pagination') }}
                <table class="table is-striped is-fullwidth">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        @permission('read-cpf')<th>CPF</th> @endpermission
                        <th>Cargo</th>
                        <th>Unidade</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="/usuarios/{{ $user->slug }}">{{ $user->nome_curto }}</a></td>
                            @permission('read-cpf')
                            <td>{{ $user->cpf }}</td> @endpermission
                            <td title="{{ $user->rh->cargoDescricao() ?: 'Sem Cargo' }}">{{ $user->rh->cargoAbreviacao() ?: 'S/N'}}</td>
                            <td title="{{ $user->unidadeDescricao() ?: 'Sem Descrição' }}">{{ $user->unidadeSigla() ?: 'S/N' }}</td>
                            <td>{{ $user->telefones()->first()->numero or 'Sem Telefone'}}</td>
                            <td>{{ $user->emails()->first()->address or 'Sem Email' }}</td>
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