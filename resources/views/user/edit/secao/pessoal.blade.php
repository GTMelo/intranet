@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Dados Pessoais</h1>

        <info-table>
            <it-item label="Filiação">
                <p>{{ $user->rh->pai()->nome or 'Não informado' }}</p>
                <p>{{ $user->rh->mae()->nome or 'Não informado' }}</p>
            </it-item>

            <it-item label="Data de Nascimento">
                {{ $user->rh->data_nascimento or 'Não informado' }}
            </it-item>

            <it-item label="Sexo">
                {{ $user->rh->sexo or 'Não informado' }}
            </it-item>

            <it-item label="Nacionalidade">
                {{ $user->rh->nacionalidade() }}
            </it-item>

            <it-item label="Naturalidade">
                {{ $user->rh->naturalidade()->nome }}/{{ $user->rh->naturalidade()->estado->sigla }}
            </it-item>

            <it-item label="Estado Civil">
                {{ $user->rh->estado_civil }}
                @if($user->rh->conjuge())<p>{{ $user->rh->conjuge()->nome }}</p> @endif</it-item>

            <it-item label="Endereço">
                <p>{{ $user->rh->endereco->logradouro }}</p>
                <p>{{ $user->rh->endereco->cep }}</p>
                <p>{{ $user->rh->endereco->cidade->nome }}/{{ $user->rh->endereco->cidade->estado->sigla }}</p>
            </it-item>

            <it-item label="Telefone residencial">
                {{ $user->rh->telefone_residencial() }}
            </it-item>

            <it-item label="Telefone celular">
                {{ $user->rh->telefone_celular() }}
            </it-item>

            <it-item label="Email particular">
                {{ $user->rh->email_pessoal()->address }}
            </it-item>
        </info-table>
    </section>

    <section>
        <h1 class="is-size-2">Dados Bancários</h1>

        <info-table>
            <it-item label="Banco">{{ $user->rh->dado_bancario->banco->nome }}</it-item>
            <it-item label="Agência">{{ $user->rh->dado_bancario->agencia }}</it-item>
            <it-item label="Conta">{{ $user->rh->dado_bancario->conta }}</it-item>
        </info-table>

    </section>

    <section>
        <h1 class="is-size-2">Dependentes e Associados</h1>

        <table class="table is-fullwidth">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Parentesco</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
            </tr>
            </thead>
            <tbody>
            @if(count($user->rh->dependentes))
                @foreach($user->rh->dependentes as $dependente)
                    <tr>
                        <td>{{ $dependente->nome }}</td>
                        <td>{{ $dependente->tipo->descricao }}</td>
                        <td>{{ $dependente->data_nascimento}}</td>
                        <td>{{ $dependente->cpf }}</td>
                    </tr>
                @endforeach
            @else
                <td colspan="4">Nenhum dependente registrado</td>
            @endif
            </tbody>
        </table>
    </section>


@endsection