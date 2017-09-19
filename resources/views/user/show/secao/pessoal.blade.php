@extends('user.show')

@section('user-content')

    <h3 class="is-size-3">Dados Pessoais</h3>

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

@endsection