@extends('user.show')

@section('user-content')

    <section>
        <h1 class="is-size-2">Dados Pessoais</h1>

        <table class="table is-fullwidth">
            <tbody>
            <tr>
                <th>Filiação</th>
                <td>
                    <p>{{ $user->rh->pai()->nome or '' }}</p>
                    <p>{{ $user->rh->mae()->nome or '' }}</p>
                </td>
            </tr>
            <tr>
                <th>Data de Nascimento</th>
                <td>
                    {{ $user->rh->data_nascimento }}
                </td>
            </tr>
            <tr>
                <th>Sexo</th>
                <td>
                    {{ $user->rh->sexo }}
                </td>
            </tr>
            <tr>
                <th>Nacionalidade</th>
                <td>
                    {{ $user->rh->nacionalidade() }}
                </td>
            </tr>
            <tr>
                <th>Naturalidade</th>
                <td>
                    {{ $user->rh->naturalidade()->nome }}/{{ $user->rh->naturalidade()->estado->sigla }}
                </td>
            </tr>
            <tr>
                <th>Estado Civil</th>
                <td>
                    {{ $user->rh->estado_civil }}
                    @if($user->rh->conjuge())<p>{{ $user->rh->conjuge()->nome }}</p> @endif
                </td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td>
                    <p>{{ $user->rh->endereco->logradouro }}</p>
                    <p>{{ $user->rh->endereco->cep }}</p>
                    <p>{{ $user->rh->endereco->cidade->nome }}/{{ $user->rh->endereco->cidade->estado->sigla }}</p>
                </td>
            </tr>
            <tr>
                <th>Telefone Residencial</th>
                <td>
                    {{ $user->rh->telefone_residencial() }}
                </td>
            </tr>
            <tr>
                <th>Telefone Celular</th>
                <td>
                    {{ $user->rh->telefone_celular() }}
                </td>
            </tr>
            <tr>
                <th>E-mail Pessoal</th>
                <td>
                    {{ $user->rh->email_pessoal()->address }}
                </td>
            </tr>

            </tbody>
        </table>
    </section>

    <section>
        <h1 class="is-size-2">Dados Bancários</h1>

        <table class="table is-fullwidth">
            <tbody>
            <tr>
                <th>Banco</th>
                <td>
                    <p>{{ $user->rh->dado_bancario->banco->nome }}</p>
                </td>
            </tr>
            <tr>
                <th>Agência</th>
                <td>
                    <p>{{ $user->rh->dado_bancario->agencia }}</p>
                </td>
            </tr>
            <tr>
                <th>Conta</th>
                <td>
                    <p>{{ $user->rh->dado_bancario->conta }}</p>
                </td>
            </tr>
            </tbody>
        </table>
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