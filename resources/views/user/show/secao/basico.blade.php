@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Dados Básicos</h1>
        <i-table>
            <i-item label="Nome Completo">{{ $user->nome_completo }}</i-item>
            <i-item label="CPF"> {{ $user->cpf }}</i-item>
            <i-item label="Data de entrada na SAIN"> {{ $user->rh->vinculo->entrada_sain }}</i-item>
        </i-table>
    </section>

@endsection