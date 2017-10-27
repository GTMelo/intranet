@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Dados Básicos</h1>
        <i-table>
            <i-item label="Nome Completo">{{ $user->nome_completo }}</i-item>
            @if(auth()->check() && auth()->user()->canOrOwns($user->rh, 'read-cpf'))
                <i-item label="CPF"> {{ $user->cpf }}</i-item>
            @endif
            @if($user->rh->vinculo) <i-item label="Data de entrada na SAIN"> {{ $user->rh->vinculo->entrada_sain }}</i-item> @endif
        </i-table>
    </section>

@endsection